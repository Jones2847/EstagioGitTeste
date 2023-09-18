@extends('admin.admin_master')
@section('admin')

    @php
        $wXnameSupplier = App\Models\Supplier::where('code',$wPurchaseOrderC[0]->supplierCode)->first();

        $wXpostalLocation = App\Models\PostalCode::where('postalCode',$wXnameSupplier->postalCode)->first();

    @endphp

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Purchase Order</h4>
                    </div>
                    <div class="page-title-rigth">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility </a></li>
                            <li class="breadcrumb-item active">Purchase Order</li>
                        </ol>
                    </div>
                </div>

                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="invoice-title">
                                            <br><br>
                                            <h4 class="float-end font-size-16">Purchase Order Nº {{$wPurchaseOrderC[0]["pONumber"]}}<strong></strong></h4>
                                            <h3><img src="{{ asset('backend/assets/images/login-sm.png')}}" alt="logo"  height="54" >

                                            </h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                            </div>

                                            <div class="col-6">
                                                <address>
                                                    <h4> <strong> Purchase Order To:</strong></h4><br>
                                                    <h5>  <strong> {{$wPurchaseOrderC[0]['supplierLink']['name']}}</strong></h5>
                                                    Nif: {{$wPurchaseOrderC[0]['supplierLink']['nif']}}<br>
                                                    {{$wPurchaseOrderC[0]['supplierLink']['address1']}}<br>
                                                    {{$wPurchaseOrderC[0]['supplierLink']['address2']}}<br>
                                                    {{$wPurchaseOrderC[0]['supplierLink']['supplier_postalcode']}}
                                                    {{$supplier[0]['postalCodeLink']['location']}}

                                                </address>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 mt-4">
                                                <address>
                                                    <strong>Payment Method:</strong><br>
                                                    30 Days <br>
                                                </address>
                                            </div>
                                            <div class="col-6 mt-4 text-end">
                                                <address>
                                                    <strong>Order Date:</strong><br>
                                                    {{date('d-m-Y', strtotime($wPurchaseOrderC[0]['pODate']))}}
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <div class="p-2">

                                            </div>
                                            <div class="">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <td><strong>S1</strong></td>
                                                            <td class="text-center"><strong>Product Code</strong></td>
                                                            <td class="text-center"><strong>Product Name</strong></td>
                                                            <td class="text-center"><strong>Quantity</strong></td>
                                                            <td class="text-center"><strong>Unit Price</strong></td>
                                                            <td class="text-center"><strong>Date Delivery</strong></td>
                                                            <td class="text-center"><strong>Total Price</strong></td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @php
                                                            $total_sum = 0;
                                                        @endphp

                                                        @foreach($wPurchaseOrderD as $key => $details)
                                                            <tr>
                                                                <td class="text-center">{{ $key+1 }}</td>
                                                                <td class="text-center">{{ $details['productCode'] }}</td>
                                                                <td class="text-center">{{$wPurchaseOrderD[$key]['ProductCodeLink']['description']}}</td>
                                                                <td class="text-center">{{$details->quantity}}</td>
                                                                <td class="text-center">{{$details->unitPrice}}</td>
                                                                <td class="text-center">{{date('d-m-Y', strtotime($wPurchaseOrderD[0]["pODateDelivery"]))}}</td>
                                                                <td class="text-center">{{$details->sellingPrice}}</td>
                                                            </tr>
                                                            @php
                                                                $total_sum += $details->sellingPrice;
                                                            @endphp
                                                        @endforeach
                                                        <tr>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"></td>
                                                            <td class="thick-line"><strong>Subtotal</strong></td>
                                                            <td class="thick-line text-end">${{ $total_sum }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center"><strong>Discount Amount</strong></td>
                                                            <td class="no-line text-end"> {{$wPurchaseOrderC[0]->discount}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center"><strong>Grand Amount</strong></td>
                                                            <td class="no-line text-end"><h4 class="m-0"> {{$wPurchaseOrderC[0]->total}}</h4></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="d-print-none">
                                                    <div class="float-end">
                                                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-ligth"><i class="fa fa-print"></i></a>
                                                        <a href="{{ route('purchaseOrderPDF.save',$wPurchaseOrderC[0]->pONumber)}}" class=" btn btn-primary waves-effect waves-ligth ms-2">
                                                            Download</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end row-->

                            </div>
                        </div>
                    </div>  <!-- end col-->
                </div>
            </div><!-- end row-->
        </div><!-- conainer-fluid-->
    </div>
@endsection
