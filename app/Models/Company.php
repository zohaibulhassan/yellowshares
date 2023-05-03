<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Exception;

class Company extends Model
{
    use HasFactory, SoftDeletes;
    public $table='companies';
    protected $fillable=['company_status','description','company_name','company_id','shareholder_id'];
    protected $dates=['deleted_at'];
}
