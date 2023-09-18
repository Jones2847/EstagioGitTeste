<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderD extends Model
{
    use HasFactory;
    protected $table = "PurchaseOrderD";
    protected $guarded = [];

    public function ProductCodeLink(){
        return $this->belongsTO(Product::class,'productCode','code');
    }

    public function ProductFamilyLink(){
        return $this->belongsTO(Product::class,'product_family','productFamily');
    }

    public function ProductUnitLink(){
        return $this->belongsTO(Product::class,'product_unit','productUnit');
    }

    public function ProductTaxRateCode(){
        return $this->belongsTO(Product::class,'product_taxRateCode','taxRateCode');
    }
}
