<?php

namespace App\Http\Controllers\Actl;

use App\Http\Controllers\Controller;
use http\Client\Response;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Family;


class CommonController extends Controller
{
    public function GetProduct(Request $request){
        $family = $request->input('family');
        $product = Product::where('product_family',$family)->get();
        return response()->json($product);

    }
    public function GetStock(Request $request){

          $product_id =$request->input('product_id');
          $product = Product::where('code',$product_id)->pluck('quantity');


          return response()->json($product[0]);



    }

    public function CheckFamily(Request $request){

        dd($request);

        return response()->json(['success' => true]);


    }
}
