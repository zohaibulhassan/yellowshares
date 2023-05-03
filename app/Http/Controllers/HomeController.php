<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    //     $ind_count = User::where('role_id', 2)->count();
    //     $ren_count = User::where('role_id', 3)->count();
    //     $crpt_count = User::where('role_id', 4)->count();
        
         



    //     $data=array();


    //     // $userstatus = User::where('role_id', '!=', '')->get()->skip('1');
    //     // return $userstatus;
    //       $blogs_status_data = [];
    //       $property_status_data = [];
    //       $user_count_status=[];
    //       $subscriber_count_status =[];
    //       $property_count_status=[];
    //       $blogs_count_status=[];

          
    //         $blogs_status_data['label'][] = "individual";
    //         $blogs_status_data['count'][] = (int) $ind_count;
    //         $blogs_status_data['label'][] = "ren";
    //         $blogs_status_data['count'][] = (int) $ren_count;
            
    //         $blogs_status_data['label'][] = "corporate";
    //         $blogs_status_data['count'][] = (int) $crpt_count;
         
           
          
        
    //         $properties = DB::table('news_letter_categories')
    // ->select('news_letter_categories.title', DB::raw('count(properties.property_type) as property_category_count'))
    // ->leftJoin('properties', 'news_letter_categories.id', '=', 'properties.property_type')
    // ->groupBy('news_letter_categories.title')
    // ->get();
    //     //     $properties = Property::leftJoin('news_letter_categories','news_letter_categories.id','properties.property_type')
         
    //     //   ->select(DB::raw('count(distinct properties.property_type) as count'))
    //     //     ->first()->count;
          
    //       foreach($properties as $p)
    //       {
    //        $property_status_data['label'][] = $p->title;
    //         $property_status_data['count'][] =  $p->property_category_count;
   
    //       }
    //       $data['blog_status_chart_data'] =  $blogs_status_data;
    //       $data['property_status_chart_data']=$property_status_data;

         

    //     return response()->json($data,200); 
        return view('home');
    }
}
