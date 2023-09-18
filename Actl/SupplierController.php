<?php

namespace App\Http\Controllers\Actl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplier;

use App\Models\PostalCode;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class SupplierController extends Controller
{
    public function SupplierAll(){

        $supplier = Supplier::latest()->get();
        return view('backend.supplier.supplier_all', compact('supplier'));
    }

    public function SupplierAdd(){
        $postalcodes = PostalCode::latest()->get();
        return view('backend.supplier.supplier_add',compact('postalcodes'));
    }

    public function SupplierStore(Request $request){

        Supplier::insert([
            'code' => $request-> code,
            'name' => $request-> name,
            'address1' => $request-> address1,
            'address2' => $request-> address2,
            'town' => $request-> town,
            'nif' => $request-> nif,
            'supplier_postalcode' => $request-> postalCode,

            'created_by'  => Auth::user()-> id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Supplier Successfuly Inserted',
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);
    }


    public function SupplierEdit($id){

        $supplier = Supplier::findOrFail($id);
        $postalcodes = PostalCode::latest()->get();

        return view('backend.supplier.supplier_edit',compact('supplier'),compact('postalcodes'));




    }


    public function SupplierUpdate(Request $request){

        $supplier_id = $request->id;

        Supplier::findOrFail($supplier_id)->update([
            'code' => $request-> code,
            'name' => $request-> name,
            'address1' => $request-> address1,
            'address2' => $request-> address2,
            'town' => $request-> town,
            'nif' => $request-> nif,
            'supplier_postalcode' => $request-> postalCode,

            'created_by'  => Auth::user()-> id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Supplier Successfuly Inserted',
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);
    }



    public function SupplierDelete($id){

        Supplier::findOrFail($id) -> delete();

        $notification = array(
            'message' => 'Supplier Successfuly Deleted',
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);
    }
}
