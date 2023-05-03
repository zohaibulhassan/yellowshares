<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class CompanyShareMapping extends Model
{
    use HasFactory;
    public $table='company_share_mappings';
    protected $fillable=['company_id','shared_companies_id'];
    public static function getAllMappedCompanies($id)
    {
        // $records1 = CompanyShareMapping::
        //  leftJoin('companies','companies.id','company_share_mappings.company_id')
        // ->orderBy('companies.id','DESC')
		// 			->select(['company_share_mappings.company_id','companies.company_name as shareholder_name','companies.company_name','companies.shareholder_id','companies.id','companies.description',
        //             'companies.company_id','company_share_mappings.shared_companies_id'])
					
		// 			->where('company_share_mappings.company_id', $id)
		// 			->get();
        $records = CompanyShareMapping::leftJoin('companies','companies.id','company_share_mappings.shared_companies_id')
        // ->leftJoin('companies','companies.id','company_share_mappings.company_id')
        ->orderBy('companies.id','DESC')
					->select(['companies.company_id','companies.company_name','companies.shareholder_id','companies.company_name as shareholder_name',
         
                    'company_share_mappings.company_id as companyid'])
					
					->where('company_share_mappings.company_id', $id)
					->get();
                    foreach ($records as $d) {
                        $d->company_name = CompanyShareMapping::checkCompanyName($d->companyid);
                       
                    }
                    // return $data;
		//dd($records);			
		return $records;	

    }
    public static function checkCompanyName($id){
        try
        {
          $data  = \DB::table('companies')->where('id',$id)->value('company_name');
          return $data;
        }
        catch(\Exception $e)
        {
          return back()->withError($e->getMessage());
        }
      }
    
}
