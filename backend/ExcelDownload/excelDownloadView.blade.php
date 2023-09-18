@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Search Querry </h4><br><br>
                            <form  action="{{ route('excelDownloadTableView') }}">
                            @csrf
                                <div class="form-group">
                                    <label>Select Table(s) to Download</label>
                                    <div class="form-group">

                                        <select class="form-control" id="select1" name="select1">
                                            <option value="" selected>Select Please...</option>
                                            <option value="Family">Family</option>
                                            <option value="PostalCode">Postal Code</option>
                                            <option value="Product">Product</option>
                                            <option value="PurchaseOrderC">Purchase Order Number</option>
                                            <option value="PurchaseOrderD">Purchase Order Products</option>
                                            <option value="Supplier">Supplier</option>
                                            <option value="TaxRate">Tax Rate</option>
                                            <option value="UnitMeasure">Unit Measure</option>
                                        </select>


                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Download</button>

                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    {{--                                        <label for="table">Select Table</label>--}}
    {{--                                        <select class="form-control" id="select2" name="select2">--}}
    {{--                                            <option value="" selected>Select Please...</option>--}}
    {{--                                            <option value="Family">Family</option>--}}
    {{--                                            <option value="PostalCode">Postal Code</option>--}}
    {{--                                            <option value="Product">Product</option>--}}
    {{--                                            <option value="PurchaseOrderC">Purchase Order Number</option>--}}
    {{--                                            <option value="PurchaseOrderD">Purchase Order Products</option>--}}
    {{--                                            <option value="Supplier">Supplier</option>--}}
    {{--                                            <option value="TaxRate">Tax Rate</option>--}}
    {{--                                            <option value="UnitMeasure">Unit Measure</option>--}}
    {{--                                        </select>--}}
    {{--                                        <label for="table">Select Table</label>--}}
    {{--                                        <select class="form-control" id="select3" name="select3">--}}
    {{--                                            <option value="" selected>Select Please...</option>--}}
    {{--                                            <option value="Family">Family</option>--}}
    {{--                                            <option value="PostalCode">Postal Code</option>--}}
    {{--                                            <option value="Product">Product</option>--}}
    {{--                                            <option value="PurchaseOrderC">Purchase Order Number</option>--}}
    {{--                                            <option value="PurchaseOrderD">Purchase Order Products</option>--}}
    {{--                                            <option value="Supplier">Supplier</option>--}}
    {{--                                            <option value="TaxRate">Tax Rate</option>--}}
    {{--                                            <option value="UnitMeasure">Unit Measure</option>--}}
    {{--                                        </select>--}}
    {{--                                        <label for="table">Select Table</label>--}}
    {{--                                        <select class="form-control" id="select4" name="select4">--}}
    {{--                                            <option value="" selected>Select Please...</option>--}}
    {{--                                            <option value="Family">Family</option>--}}
    {{--                                            <option value="PostalCode">Postal Code</option>--}}
    {{--                                            <option value="Product">Product</option>--}}
    {{--                                            <option value="PurchaseOrderC">Purchase Order Number</option>--}}
    {{--                                            <option value="PurchaseOrderD">Purchase Order Products</option>--}}
    {{--                                            <option value="Supplier">Supplier</option>--}}
    {{--                                            <option value="TaxRate">Tax Rate</option>--}}
    {{--                                            <option value="UnitMeasure">Unit Measure</option>--}}
    {{--                                        </select>--}}

@endsection
