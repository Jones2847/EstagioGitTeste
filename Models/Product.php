<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "Product";
    protected $guarded = [];

    public function unitMeasureLink(){

        return $this->belongsTO(UnitMeasure::class,'unitMeasure','unitMeasure');
    }
    public function familyLink(){

        return $this->belongsTO(Family::class,'family','family');
    }
    public function taxRateLink(){

        return $this->belongsTO(TaxRate::class,'taxRate','taxRate');
    }

}
