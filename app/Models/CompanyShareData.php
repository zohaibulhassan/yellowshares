<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyShareData extends Model
{
    use HasFactory;
    public $table='company_share_data';
    protected $fillable=['CompanyId','Company','ShareHolderID','ShareHolder','ShareHolderType','Percentage','NoShares','Regnumber','StockYearSpan'];
}
