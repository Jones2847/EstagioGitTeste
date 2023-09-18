@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Save Purchase Order List</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('purchaseOrder.add')}}" class="btn btn-secondary btn-rounded waves effect waves-light"
                               style="float: right;">Add Purchase Order</a>
                            <h4 class="card-title">Purchase Order All Data </h4>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Supplier Name</th>
                                    <th>P. Order No </th>
                                    <th>Date</th>
                                    <th>Observations</th>
                                    <th>Total</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($allPOrderData as $key => $item)
                                    <tr>
                                        <td> {{ $key+1}} </td>
                                        <td> {{ $item['supplierLink']['name'] }} </td>
                                        <td> {{ $item->pONumber }} </td>
                                        <td> {{ date('d-m-y',strtotime($item->pODate))}} </td>
                                        <td> {{ $item->pOObservation }} </td>
                                        <td> {{{ sprintf('€ %s', number_format($item->total, 2))}}} </td>
                                        <td>
                                            <a href="{{route('purchaseOrder.save', $item->pONumber)}}" class="btn btn-info sm"
                                               title="Saved Purchases Orders">  <i class="fa fa-print"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection
