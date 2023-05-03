<?php

namespace App\Imports;

use App\Models\Company;
use App\Models\CompanyShareData;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\Auth;


class ImportCompany implements ToCollection, withHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
	
	
	public function collection (Collection $rows)
	{
		
		$rows->each(function($row, $key){
		
	
		 if(!empty($row)){
			 //dd($row);
		  					
		 
			
				CompanyShareData::create([
				'CompanyId' => $row['companyid'],
				'Company' => $row['company'],
				'ShareHolderID' => $row['shareholderid'],
				'ShareHolder' => $row['shareholder'],
				'ShareHolderType' => $row['shareholdertype'],
				'Percentage' => $row['percentage'],
				'NoShares' => $row['noshares'],	
				'Regnumber' => $row['regnumber'],
				'StockYearSpan' => $row['stockyearspan'],
				
			
			]);
		
	}
	});
	}
}

