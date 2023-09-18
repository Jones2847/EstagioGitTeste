<?php

namespace App\Http\Controllers\Actl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

use App\Models\Product;

use App\Models\Family;
use App\Models\UnitMeasure;
use App\Models\TaxRate;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function ProductAll(){

        $products = Product::latest()->get();
        return view('backend.product.product_all', compact('products'));
    }

    public function ProductAdd(){
        $family = Family::latest()->get();
        $unit_measure = UnitMeasure::latest()->get();
        $tax_rate = TaxRate::latest()->get();

        return view('backend.product.product_add',compact('family','unit_measure','tax_rate'));
    }

    public function ProductStore(Request $request){
        $imageFile = $request->file('image');
        $transformName = hexdec(uniqid()).".".$imageFile->getClientOriginalExtension();
        Image::make($imageFile)->resize(200,200)->save('upload/product/'.$transformName);
        $save_url = 'upload/product/'.$transformName;

        dd($request);


        Product::insert([
            'code' => $request-> code,
            'description' => $request-> description,
            'image' => $save_url,
            'product_family' => $request-> product_family,
            'product_unit' => $request-> product_unit,
            'product_taxRateCode' => $request-> product_taxRateCode,
            'quantity'=>$request->quantity,
            'created_by'  => Auth::user()-> id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Successfuly Inserted',
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification);
    }

    public function ProductEdit($id){
        $family = Family::latest()->get();
        $unit_measure = UnitMeasure::latest()->get();
        $tax_rate = TaxRate::latest()->get();

        $product = Product::findOrFail($id);
        return view('backend.product.product_edit', compact('product','family','unit_measure','tax_rate'));
    }



    public function ProductUpdate(Request $request){


        $product_id = $request->id;
        $save_url="";
        if ($request->file('image')){

            $image = $request->file('image');

            $name_gen = hexdec(uniqid()).".".$image->getClientOriginalExtension();
            Image::make($image)->resize(200,200)->save('upload/product/'.$name_gen);
            $save_url = 'upload/product/'.$name_gen;


        }


        Product::findOrFail($product_id)->update([
            'code' => $request-> code,
            'description' => $request-> description,
            'image' => $save_url,
            'product_family' => $request-> product_family,
            'product_unit' => $request-> product_unit,
            'product_taxRateCode' => $request-> product_taxRateCode,
            'quantity' => $request-> quantity,
            'created_by'  => Auth::user()-> id,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Successfuly Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification);
    }
    public function ProductDelete($id){

        Product::findOrFail($id) -> delete();

        $notification = array(
            'message' => 'Product Successfuly Deleted',
            'alert-type' => 'success'
        );

        return redirect()->route('product.all')->with($notification);
    }



}
