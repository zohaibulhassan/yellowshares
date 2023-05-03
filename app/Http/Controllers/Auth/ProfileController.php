<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PaymentPricingSettings;
use Illuminate\Http\Request, Response, Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Str;
use App\Helpers\Helper;
use App\Models\Company;
use App\Models\CompanyShareMapping;
use App\Models\CompanyShareData;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

use Datatables;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;
use App\Exports\ExportCompany;
use App\Imports\ImportCompany;

// use Excel;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showAllCompanies(Request $request)
    {
        if ($request->ajax()) 
        {
            $comapnies = Company::all();
           
            
            $data= FacadesDataTables::of($comapnies)->addIndexColumn()
            ->addColumn('action', function($data){
               
               
                $btn='';
                $btn='<div class="row">';
                //$btn .= '<a style="display: inline !important;" class="btn btn-info btn-sm " href=" '.route('admin.users.show',$data->id) .'"><i class=" fa fa-eye"></i></a>';
                
                
                //<button  style="display: inline !important;" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true" onclick="return confirm('Do you want to delete ?')"></i>&nbsp;</button>
                //<a style="display: inline !important;" class="btn btn-info btn-xs" href="{{ URL::to('admin/tags/' . $tg->id . '/edit') }}"> <i class="fas fa-pencil-alt"></i></a>
                
                $btn .= '<a style="display: inline !important;" href=" '.route('edit-company',$data->id) .'"><button class="btn btn-success">Edit</button></a>';
                $btn .= '<a style="display: inline !important;" href=" '.route('upload-company-details',$data->id) .'"><button class="btn btn-primary">Upload Company</button></a>';
                $btn .= '<a style="display: inline !important;" href=" '.route('map-company',$data->id) .'"><button class="btn btn-secondary">Map Company</button></a>';
                
                $btn .='</div>';
                return $btn;
            })
            ->rawColumns(['action']);
            return $data->make(true);
        
        }
        return view('all-companies');

    }
    public function showAllUsers(Request $request)
    {
       
       

        if ($request->ajax()) 
            {
                $users = User::all();
               
                
                $data= FacadesDataTables::of($users)->addIndexColumn()
                ->addColumn('action', function($data){
                   
                   
                    $btn='';
                    $btn='<div class="row">';
                    //$btn .= '<a style="display: inline !important;" class="btn btn-info btn-sm " href=" '.route('admin.users.show',$data->id) .'"><i class=" fa fa-eye"></i></a>';
                    if( $data->user_status=="r")
                    {
                        $btn .= '<a style="display: inline !important;" href=" '.route('active-user',$data->id) .'"><button class="btn btn-success">Suscriber</button></a>';
                    }
                    if($data->user_status=="a" )
                    {
                        $btn .= '<a style="display: inline !important;" href=" '.route('deactive-user',$data->id) .'"><button class="btn btn-primary">UnSuscriber</button></a>';

                    }
                    if($data->user_status=="p")
                    {
                        $btn .= '<a style="display: inline !important;" href=" '.route('active-user',$data->id) .'"><button class="btn btn-success">Suscriber</button></a>';
                        $btn .= '<a style="display: inline !important;" href=" '.route('deactive-user',$data->id) .'"><button class="btn btn-primary">UnSuscriber</button></a>';
                    }
                    
                    
                    $btn .= '<a style="display: inline !important;" href=" '.route('delete-user',$data->id) .'"><button class="btn btn-danger">Delete</button></a>';
                    
                    $btn .='</div>';
                    return $btn;
                })
                ->rawColumns(['action']);
                return $data->make(true);
            
            }
            return view('all-users');

    }
    public function createCompany()
    {
        return view('create-company');
    }
    public function editCompany($id)
    {
        $company = Company::find($id);
        return view('edit-company',compact('company'));
    }
    public function saveCompany(Request $request)
    {
        $company = new Company();
        $company->company_name =  $request->company_name;
        $company->description = $request->description;
        $company->company_id=  Str::uuid()->toString();
        $company->shareholder_id=  Str::uuid()->toString();
        $company->company_status="p";
        
        if ($company->save()) {
            return redirect()->back()->with('success', 'Company info saved');
        } else {
            return redirect()->back()->with('failed', 'Something Wrong')->withInput();
        }
    }
    public function updateCompany(Request $request)
    {
       
        $company =  Company::find($request->id);
       
        $company->company_name =  $request->company_name;
        $company->description = $request->description;
        
        
        if ($company->save()) {
            return redirect()->back()->with('success', 'Company info updated');
        } else {
            return redirect()->back()->with('failed', 'Something Wrong')->withInput();
        }
    }
    public function deleteUser(Request $request)
    {
        $id = $request->user_id;
       $user = User::find($id);
        
        if ($user->delete()) {
            return redirect()->back()->with('success', 'User Deleted Succesfully');
        } else {
            return redirect()->back()->with('failed', 'Something Wrong')->withInput();
        }
    }
    public function userActivate($id)
    {
        $user = User::find($id);
        $user->user_status = "a";
        $user->save();
        
        
        
        if ($user->save()) {
            return redirect()->back()->with('success', 'You have been marked this user as suscribed');
        } else {
            return redirect()->back()->with('failed', 'Something Wrong')->withInput();
        }

    }
    public function userDeActivate($id)
    {
        $user = User::find($id);
        $user->user_status = "r";
        $user->save();
        
        
        
        if ($user->save()) {
            return redirect()->back()->with('success', 'You have been marked this user as unsuscribed');
        } else {
            return redirect()->back()->with('failed', 'Something Wrong')->withInput();
        }

    }
    public function mapCompanies($id)
    {
        $company = Company::find($id);
        $shared_comapany = CompanyShareMapping::where('company_id',$id)->pluck('shared_companies_id')->toArray();
        //dd($shared_comapany);
        $companies = Company::all();
        return view('map-companies',compact('company','companies','shared_comapany'));

    }
    public function mapCompanyDetails(Request $request)
    {
        // $data = $request->all();
        // dd($data);
        $exist_comapny = CompanyShareMapping::where('company_id',$request->id)->delete();
        //dd($exist_comapny);
        
            if(count($request->comapnies_id)>0 && $request->comapnies_id!=null)
                {
                    for($i=0;$i<count($request->comapnies_id);$i++)
                    {
                       
                        $comapny_share = new CompanyShareMapping();
                        $comapny_share->shared_companies_id =  $request->comapnies_id[$i];
                        $comapny_share->company_id = $request->id;
                        $comapny_share->save();
    
                    }

                }

       

       
       
               
                    return redirect()->back()->with('success', 'Companies mapped');
               
    }
    public function uploadCompanyDetails($id)
    {
        $company = Company::find($id);
       
        return view('upload-company-details',compact('company'));

    }
    public function exportCompanyData($id)
    {
       
        	if($id)
            {
                return Excel::download(new ExportCompany($id),'company.xlsx');

            }
            return redirect()->back()->with('success', 'Companies mapped');
			
		

    }
    public function importCompanyData(Request $request)
	{
		//dd($request->all());
		request()->validate([
            'upload-company-file'  => 'required|mimes:xls,xlsx,csv|max:4096',
            
        ]);
        $uploaded_company=request()->file('upload-company-file');

        Excel::import(new ImportCompany(),$uploaded_company);	
		
        return redirect()->back()->with('success', 'Companies mapped');
	}
    public function getGraphData(Request $request)
    {
        

        $data=array();


        
         
          $property_status_data = [];
         
        
            $properties = CompanyShareData::select(['CompanyId','Company','ShareHolderID','ShareHolder','ShareHolderType','Percentage','NoShares','Regnumber','StockYearSpan'])
   ->where('StockYearSpan','=',$request->span_year)
   ->where('Company','=',$request->company_id)
    ->get();
    
        
         $data['company_share_data']= $properties;
          foreach($properties as $p)
          {
           $property_status_data['label'][] = $p->ShareHolder;
            $property_status_data['count'][] =  $p->NoShares;
   
          }
         
          $data['property_status_chart_data']=$property_status_data;

         

        return response()->json($data,200); 

    }
    
 
}

