<?php

namespace App\Http\Controllers\Actl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Family;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
class FamilyController extends Controller
{
    public function FamilyAll(){


        $families = Family::latest()->get();
        return view('backend.family.family_all', compact('families'));}

    public function FamilyAdd(){

        return view('backend.family.family_add');}


    public function FamilyStore(Request $request){

       Family::insert([
            'family' => $request-> family,
            'created_by'  => Auth::user()-> id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Family Successfuly Inserted',
            'alert-type' => 'success'
        );

        return redirect()->route('family.all')->with($notification);
    }


    public function FamilyEdit($id){
        $family = Family::findOrFail($id);
        return view('backend.family.family_edit', compact('family'));
    }

    public function FamilyUpdate(Request $request){
        $family_id = $request->id;
        Family::findOrFail($family_id)->update([
            'family' => $request-> family,
            'updated_by'  => Auth::user()-> id,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Family Code Successfuly Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('family.all')->with($notification);
    }

    public function FamilyDelete($id){

        Family::findOrFail($id) -> delete();

        $notification = array(
            'message' => 'Family Successfuly Deleted',
            'alert-type' => 'success'
        );

        return redirect()->route('family.all')->with($notification);
    }




}
