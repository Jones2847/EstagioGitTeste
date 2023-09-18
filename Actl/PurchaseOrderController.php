<?php

namespace App\Http\Controllers\Actl;

use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

use App\Models\Supplier;
use App\Models\Product;
use App\Models\Family;
use App\Models\TaxRate;
use App\Models\UnitMeasure;
use App\Models\PurchaseOrderC;
use App\Models\PurchaseOrderD;
use Auth;
use Illuminate\Support\Carbon;
use App\Models\SavedPo;

require_once 'C:\xampp\htdocs\ERP4U\ERP4U\vendor\autoload.php';


class PurchaseOrderController extends Controller
{
    public function PurchaseOrderAll(){
        $allPOrderData = PurchaseOrderC::orderBy('pODate','desc')->orderBy('id','desc')->get();
        return view('backend.purchaseOrder.purchaseOrder_all',compact('allPOrderData'));
    }

    public function PrintPurchaseOrderList(){
        $allPOrderData = PurchaseOrderC::orderBy('pODate','desc')->orderBy('id','desc')->get();
        return view('backend.purchaseOrder.printPurchaseOrderList',compact('allPOrderData'));
    }

    public function SavePurchaseOrderList(){
        $allPOrderData = PurchaseOrderC::orderBy('pODate','desc')->orderBy('id','desc')->get();
        return view('backend.purchaseOrder.SavePurchaseOrderList',compact('allPOrderData'));
    }

    public function PurchaseOrderAdd(){
        $suppliers = Supplier::all();
        $products = Product::all();
        $families = Family::all();
        $units = UnitMeasure::all();
        $taxRates = TaxRate::all();

        $purchaseOrder_data = PurchaseOrderC::orderBy('pONumber','desc')->first();
        if ($purchaseOrder_data==null){
            $purchaseOrderNo =1;
        }
        else{
            $purchaseOrder_data = PurchaseOrderC::orderBy('pONumber','desc')->first()->pONumber;
            $purchaseOrderNo = $purchaseOrder_data+1;
        }

        $wPODate = date('Y-m-d');
        return view('backend.purchaseOrder.purchaseOrder_add', compact('suppliers','purchaseOrderNo','products', 'families','units','taxRates','wPODate'));
    }

    public function PurchaseOrderStore(Request $request){

        $products = $request->product_code;
        for ($i =0;$i<count($products);$i++){
            $product_code = $request-> product_code[$i];
            $product_family = Product::where('code',$product_code)->pluck('product_family');
            $product_unit = Product::where('code',$product_code)->pluck('product_unit');
            $product_taxRate = Product::where('code',$product_code)->pluck('product_taxRateCode');



            PurchaseOrderD::insert([

                'pONumber' => $request-> pONumber,
                'pODateDelivery' => $request-> pODate,
                'productCode'=> $product_code,
                'productFamily'=> $product_family,
                'productUnit'=>  $product_unit,
                'taxRateCode'=> $product_taxRate[0],
                'quantity'=> $request-> quantity[$i],
                'deliveryQuantity'=> $request-> quantity[$i],
                'discountPercent'=> $request-> discountValue,
                'unitPrice'=> $request-> unitPrice[$i],
                'sellingPrice'=> $request-> sellingPrice[$i],
                'status'=>'1',
                'created_by'  => Auth::user()-> id,
                'created_at' => Carbon::now(),
            ]);
        }
        PurchaseOrderC::insert([
            'pONumber' => $request-> pONumber,
            'pOObservation' => $request-> Observations,
            'supplierCode'=> $request-> supplierCode,
            'pODate'=> $request-> pODate,
            'status' =>'1',
            'discount'=> $request-> discountValue,
            'total' => $request-> estimated_amount,
            'created_by'  => Auth::user()-> id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Purchase Order Successfuly Inserted',
            'alert-type' => 'success'
        );

        return redirect()->route('purchaseOrder.all')->with($notification);
    }

    public function PurchaseOrderEdit($id){


        $suppliers = Supplier::all();
        $products = Product::all();
        $families = Family::all();
        $units = UnitMeasure::all();
        $taxRates = TaxRate::all();

        $poNumber= PurchaseOrderC::where('id',$id)->pluck('pONumber');

        $purchaseOrderC = PurchaseOrderC::where('id',$id)->get();


        $purchaseOrderD = PurchaseOrderD::where('pONumber',$poNumber[0])->get();


        $wPODate = date('Y-m-d');

        return view('backend.purchaseOrder.purchaseOrder_edit', compact('suppliers','purchaseOrderC','purchaseOrderD','products', 'families','units','taxRates','wPODate'));
    }

    public function PurchaseOrderUpdate(Request $request){


        $po = $request->pONumber;
        $products = $request->product_code;

        $po_id =  PurchaseOrderD::where('pONumber',$po)->pluck('id');

        //array de ids po_id[0] dá me o id do primeiro produto da purchase order

        $i =0;

        for ($i ;$i<count($products);$i++){
            $product_code = $request-> product_code[$i];
            $product_family = Product::where('code',$product_code)->pluck('product_family');
            $product_unit = Product::where('code',$product_code)->pluck('product_unit');
            $product_taxRate = Product::where('code',$product_code)->pluck('product_taxRateCode');

            if ($i< count($po_id)){
                //caso sejam feito update a produtos que já existiam

                PurchaseOrderD::where('id',$po_id[$i])->update([

                    'pONumber' => $request-> pONumber,
                    'pODateDelivery' => $request-> pODate,
                    'productCode'=> $product_code,
                    'productFamily'=> $product_family,
                    'productUnit'=>  $product_unit,
                    'taxRateCode'=> $product_taxRate[0],
                    'quantity'=> $request-> quantity[$i],
                    'deliveryQuantity'=> $request-> quantity[$i],
                    'discountPercent'=> $request-> discountValue,
                    'unitPrice'=> $request-> unitPrice[$i],
                    'sellingPrice'=> $request-> sellingPrice[$i],
                    'status'=>'1',
                    'created_by'  => Auth::user()-> id,
                    'created_at' => Carbon::now(),
                ]);
            }
            else{
                PurchaseOrderD::insert([
                    'pONumber' => $request-> pONumber,
                    'pODateDelivery' => $request-> pODate,
                    'productCode'=> $product_code,
                    'productFamily'=> $product_family,
                    'productUnit'=>  $product_unit,
                    'taxRateCode'=> $product_taxRate[0],
                    'quantity'=> $request-> quantity[$i],
                    'deliveryQuantity'=> $request-> quantity[$i],
                    'discountPercent'=> $request-> discountValue,
                    'unitPrice'=> $request-> unitPrice[$i],
                    'sellingPrice'=> $request-> sellingPrice[$i],
                    'status'=>'1',
                    'created_by'  => Auth::user()-> id,
                    'created_at' => Carbon::now(),
                ]);
            }


        }

        $f = count($po_id)-1;
        while ($i<count($po_id)){
            PurchaseOrderD::where('id',$po_id[$f])->delete();
            $i++;
            $f--;

        }


        PurchaseOrderC::where('pONumber',$po)->update([
            'pONumber' => $request-> pONumber,
            'pOObservation' => $request-> Observations,
            'supplierCode'=> $request-> supplierCode,
            'pODate'=> $request-> pODate,
            'status' =>'1',
            'discount'=> $request-> discountValue,
            'total' => $request-> estimated_amount,
            'created_by'  => Auth::user()-> id,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Purchase Order Successfuly Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('purchaseOrder.all')->with($notification);
    }

    public function PurchaseOrderDelete($id){

        $poNumber= PurchaseOrderC::findOrFail($id)->pluck('pONumber');

        PurchaseOrderC::findOrFail($id) -> delete();
        PurchaseOrderD::where('pONumber',$poNumber[0])->delete();

        $notification = array(
            'message' => 'Purchase Order Deleted',
            'alert-type' => 'success'
        );

        return redirect()->route('purchaseOrder.all')->with($notification);
    }


    public function PrintPurchaseOrder($purchaseOrderNumber){

        $wPurchaseOrderC = PurchaseOrderC::where('pONumber','=', $purchaseOrderNumber)->get();

        $supplier = Supplier::where('code','=', $wPurchaseOrderC[0]->supplierCode)->get();



        $wPurchaseOrderC = PurchaseOrderC::where('pONumber','=', $purchaseOrderNumber)->get();
        $wPurchaseOrderD = PurchaseOrderD::where('pONumber','=', $purchaseOrderNumber)->get();



        return view('backend.pdf.purchaseOrder_pdf', compact('wPurchaseOrderC', 'wPurchaseOrderD','supplier'));
    }

    public function StatisticsAll(){

        $products = Product::all();
        $purchaseOrdersC = PurchaseOrderC::all();
        $purchaseOrdersD = PurchaseOrderD::all();



        return view('backend.Statistics.statistics_all',compact('products','purchaseOrdersC','purchaseOrdersD'));

    }

    public function SavePurchaseOrder($purchaseOrderNumber){

        $wPurchaseOrderC = PurchaseOrderC::where('pONumber','=', $purchaseOrderNumber)->get();

        $supplier = Supplier::where('code','=', $wPurchaseOrderC[0]->supplierCode)->get();



        $wPurchaseOrderC = PurchaseOrderC::where('pONumber','=', $purchaseOrderNumber)->get();
        $wPurchaseOrderD = PurchaseOrderD::where('pONumber','=', $purchaseOrderNumber)->get();



        return view('backend.pdf.purchaseOrderSave_pdf', compact('wPurchaseOrderC', 'wPurchaseOrderD','supplier'));
    }

    public function SavePurchaseOrderPDF($purchaseOrderNumber){
        $wPurchaseOrderC = PurchaseOrderC::where('pONumber','=', $purchaseOrderNumber)->get();
        $supplier = Supplier::where('code','=', $wPurchaseOrderC[0]->supplierCode)->get();
        $wPurchaseOrderD = PurchaseOrderD::where('pONumber','=', $purchaseOrderNumber)->get();

        $dompdf = new Dompdf();
// Pass data to the view
        $data = ['wPurchaseOrderC' =>$wPurchaseOrderC, 'supplier'=>$supplier, 'wPurchaseOrderD' => $wPurchaseOrderD];
// Load a view and pass data
        $html = view('backend.PDF.purchaseOrder_pdf')->with($data)->render();

        #dd($html);

        #dd($match);

        $dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
        $dompdf->render();

// Output the generated PDF to Browser
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="purchaseOrder'.$purchaseOrderNumber.'.pdf"');
        header('Cache-Control: max-age=0');
        $dompdf-> stream();
    }

    public function savePDFtoDB($purchaseOrderNumber){

        dd("aqui");

        $wPurchaseOrderC = PurchaseOrderC::where('pONumber','=', $purchaseOrderNumber)->get();
        $supplier = Supplier::where('code','=', $wPurchaseOrderC[0]->supplierCode)->get();
        $wPurchaseOrderD = PurchaseOrderD::where('pONumber','=', $purchaseOrderNumber)->get();

        $dompdf = new Dompdf();
// Pass data to the view
        $data = ['wPurchaseOrderC' =>$wPurchaseOrderC, 'supplier'=>$supplier, 'wPurchaseOrderD' => $wPurchaseOrderD];
// Load a view and pass data
        $html = view('backend.PDF.purchaseOrder_pdf')->with($data)->render();

        #dd($html);

        #dd($match);

        $dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
        $dompdf->render();

// Output the generated PDF to Browser
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="purchaseOrder'.$purchaseOrderNumber.'.pdf"');
        header('Cache-Control: max-age=0');
        #$dompdf-> stream();

        SavedPo::insert([
            'pONumber' => $purchaseOrderNumber,
            'savedPDF' => $dompdf,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
    }
}
