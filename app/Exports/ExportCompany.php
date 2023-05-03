<?php

namespace App\Exports;

use App\Models\Company;
use App\Models\CompanyShareMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportCompany implements FromCollection,WithHeadings
{
    protected $id;
	
	
	public function __construct( $id )
	{
		$this->id = $id;
		
		
	}
       public function collection()
    {
		if( $this->id)
		{
			
			return collect(CompanyShareMapping::getAllMappedCompanies($this->id));
			//return Concept::all();
		}
		else{
			print_r("bye");
			exit();
		}
        //return Concept::all();
    }
	public function headings():array{
		return ['CompanyId','Company','ShareHolderID','ShareHolder','ShareHolderType','Percentage','NoShares','Regnumber','StockYearSpan'];
	}
}



// <?php

// namespace App\Exports;

// use App\Models\Concept;
// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithHeadings;
// use Illuminate\Http\Request;

// class ConceptExport implements FromCollection,WithHeadings
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
// 		if(request()->has('class') || request()->has('subject') || request()->has('chapter'))
// 		{
			
// 			return collect(Concept::getConcept());
// 			//return Concept::all();
// 		}
// 		else{
// 			print_r("bye");
// 			exit();
// 		}
//         //return Concept::all();
//     }
// 	public function headings():array{
// 		return ['ID','Chapter_Id','CONCEPT','Learning Outcomes','Learning Objective','Class_ID','Subject_ID'];
// 	}
// }



// public static function getConcept()
// 	{
// 		//dd(request()->all());
		
// 		$records = Concept::orderBy('concept.id','DESC')
// 					->select(['concept.id','concept.chapter_id','concept.name','concept.description',
// 					'concept.learning_outcomes','concept.class_id','concept.subject_id'])
// 					->where('concept.class_id',request()->input('class'))
// 					->where('concept.subject_id',request()->input('subject'))
// 					->where('concept.chapter_id', request()->input('chapter'))
// 					->get();
// 		//dd($records);			
// 		return $records;			
		
// 		/*dd($records);
// 			if(!empty(request()->input('class')))
// 			{
// 				$records = $records->where('concept.class_id',request()->input('class'));
// 			}
// 			if(!empty(request()->input('subject')))
// 			{
// 				$records = $records->where('concept.subject_id',request()->input('subject'));
// 			}
// 			if(!empty(request()->input('chapter')))
// 			{
// 				$records = $records->where('concept.chapter_id', request()->input('chapter'));
// 			}
// 		//$records = $records->get();
// 		//dd($records);*/
					
		
// 	}

