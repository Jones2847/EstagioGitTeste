@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Purchase Order </h4><br><br>
                            <div class="row">
                                <div class="col md-1">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">P.O. Nª</label>
                                        <input id="pONumber" name="pONumber" class="form-control example-date-input" type="text" value="{{$purchaseOrderD[0]->pONumber}}"readonly style="background-color: #ddd">
                                    </div>
                                </div>


                                <div class="col md-2">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Date</label>
                                        <input id="pODate" name="pODate" class="form-control example-date-input" type="date"
                                               value="{{$purchaseOrderC[0]->pODate}}">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Supplier Name</label>
                                        <select id="supplierCode" name="supplierCode" class="form-select select2" aria-label="Default select example" >
                                            <option selected=""></option>
                                            @foreach($suppliers as $supp)
                                                <option value="{{$supp-> code}}">{{$supp-> name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Family</label>
                                        <select id="family" name="family" class="form-select select2" aria-label="Default select example" >
                                            <option selected="">Open this selected menu</option>
                                            @foreach($families as $fam)

                                                <option value="{{$fam->family}}">{{$fam->family}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Product Name</label>
                                        <select id="product_id" name="product_id" class="form-select select2" aria-label="Default select example" >
                                            <option selected="">Select Please...</option>

                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="col-md-1">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Stock(Pic/Kg)</label>
                                        <input readonly type="text" style="background-color: #ddd" id="current_stock_qty" name="current_stock_qty" class="form-control example-date-input" aria-label="Default select example" >

                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="col-md-1">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label" style="margin-top: 43px"></label>
                                        <i class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle addeventmore">Add</i>


                                    </div>
                                </div>

                            </div>
                        </div><!-- card Body -->


                        <div class="card-body">
                            <form method="post" id="formsupdet" action="{{route('purchaseOrder.update')}}">
                                @csrf
                                <input type="hidden" id="wwSupplierCode" name="wwSuplierCode" value="">
                                <input type="hidden" id="wwPODate" name="wwPODate" value="">
                                <input type="hidden" id="wwPONumber" name="wwPONumber" value="">
                                <input type="hidden" id="wwDiscount" name="wwDiscount" value="">
                                <input type="hidden" id="wwPOObservation" name="wwPOObservation" value="">
                                <input type="hidden" id="wwestimated-amount" name="wwestimated-amount" value="">

                                <table class="table-sm table-bordered" width="100%"style="border-color: #ddd">

                                    <thead>
                                    <tr>
                                        <th width="25%">Code Product</th>
                                        <th width="10%">PSC/KG</th>
                                        <th width="5%">UM</th>
                                        <th width="10%">Unit Price</th>
                                        <th width="30%">Description</th>
                                        <th width="10%">Total Price</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>


                                    <tbody id="addRow" class="addRow">

                                    @foreach($purchaseOrderD as $orders)
                                        <tr class="delete_add_more_item" id="delete_add_more_item">


                                            <input type="hidden" name="pODate" value="{{$orders->pODateDelivery}}">
                                            <input type="hidden" name="pONumber" value="{{$orders->pONumber}}">
                                            <input type="hidden" name="supplierCode" value="{{$purchaseOrderC[0]->supplierCode}}">
                                            <input type="hidden" name="family" value="{{$orders->productFamily}}">


                                            <td>
                                                <input type="hidden" name="product_code[]" value="{{$orders->productCode}}">{{$orders->productCode}}
                                            </td>
                                            <td>
                                                <input type="number" min="1 " name="quantity[]" class="form-control quantity text-right" value="{{$orders->quantity}}">
                                            </td>
                                            <td>
                                                <input type="hidden" name="ProductUnit[]" value="">
                                            </td>

                                            <td>
                                                <input type="number" name="unitPrice[]" class="form-control unitPrice text-right" value="{{$orders->unitPrice}}">
                                            </td>

                                            <td>
                                                <input type="hidden" name="product_name[]" value="{{$orders['ProductCodeLink']['description']}}">{{$orders['ProductCodeLink']['description']}}
                                            </td>

                                            <td>
                                                <input type="number" name="sellingPrice[]" class="form-control sellingPrice text-right" value="{{$orders->sellingPrice}}" readonly>
                                            </td>

                                            <td>
                                                <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
                                            </td>


                                        </tr>

                                    @endforeach
                                    </tbody>

                                    <tbody>

                                    <tr>
                                        <td colspan="5">Discount</td>
                                        <td>
                                            <input type="number" name="discountValue" value="{{$purchaseOrderD[0] -> discountPercent}}" id="discountValue"
                                                   class="form-control estimated_amount" placeholder="Disc. value...">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">Purchase Order Total</td>
                                        <td>
                                            <input type="text" name="estimated_amount" value="0" id="estimated_amount"
                                                   class="form-control estimated_amount" readonly style="background-color: #ddd">
                                        </td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table><br>


                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <textarea name="Observations" class="form-control" id="pOObservation" placeholder="Write here purchase Order observations..." >{{$purchaseOrderC[0]-> pOObservation}}</textarea>
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <button  class="btn btn-info" id="storeButton">Purchase Store</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>


    <script id="document-template" type="text/x-handlebars-template">


        <tr class="delete_add_more_item" id="delete_add_more_item">


            <input type="hidden" name="pODate" value="@{{date}}">
            <input type="hidden" name="pONumber" value="@{{purchase_no}}">
            <input type="hidden" name="supplierCode" value="@{{supplier_id}}">
            <input type="hidden" name="family" value="@{{family}}">


            <td>
                <input type="hidden" name="product_code[]" value="@{{productCode}}">@{{productCode}}
            </td>
            <td>
                <input type="number" min="1 " name="quantity[]" class="form-control quantity text-right" value="1">
            </td>
            <td>
                <input type="hidden" name="ProductUnit[]" value="@{{ProductUnit}}">@{{ProductUnit}}
            </td>

            <td>
                <input type="number" name="unitPrice[]" class="form-control unitPrice text-right" value="0">
            </td>

            <td>
                <input type="hidden" name="product_name[]" value="@{{product_name}}">@{{product_name}}
            </td>

            <td>
                <input type="number" name="sellingPrice[]" class="form-control sellingPrice text-right" value="0" readonly>
            </td>

            <td>
                <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
            </td>


        </tr>

    </script>

    <script type="text/javascript">



        $(document).ready(function () {

            totalAmountPrice();
            $("#storeButton").click(function () {


                $('wwSupplierCode').val($('#supplierCode').val());
                $('wwPODate').val($('#pODate').val());
                $('wwPONumber').val($('#pONumber').val());
                $('wwDiscount').val($('#discountValue').val());
                $('wwPOObservation').val($('#pOObservation').val());
                $('wwestimated_amount').val($('#estimated_amount').val());



                $("#formsupdet").submit();
            });

            $(document).on("click", ".addeventmore", function () {

                var date = $('#pODate').val();



                var purchase_no = $('#pONumber').val();
                var supplier_id = $('#supplierCode').val();
                var product_id = $('#product_id').val();
                var stock = $('#current_stock_qty').val();
                var family = $('#family').val();
                var product_name = $('#product_id').find('option:selected').text();

                if (date == '') {
                    $.notify("Date is required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (supplier_id == 'Select Please...') {
                    $.notify("Supplier is required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (family == 'Select Please...') {
                    $.notify("Family is required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (product_id == '') {
                    $.notify("Product is required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }

                var source = $("#document-template").html();

                var template = Handlebars.compile(source);

                var data = {

                    date: date,
                    purchase_no: purchase_no,
                    supplier_id: supplier_id,
                    productCode: product_id,
                    product_name: product_name,
                    family: family
                };

                var html = template(data);

                $("#addRow").append(html)
            });

            $(document).on("click", ".removeeventmore", function (event) {
                $(this).closest(".delete_add_more_item").remove();
                totalAmountPrice();
            });

            $(document).on("keyup click", ".unitPrice,.quantity", function () {
                var unitPr = $(this).closest("tr").find("input.unitPrice").val();
                var qty = $(this).closest("tr").find("input.quantity").val();
                var total = unitPr * qty;

                $(this).closest("tr").find("input.sellingPrice").val(total);

                $('#discountValue').trigger('keyup');

            });
            $(document).on("keyup", "#discountValue", function () {

                totalAmountPrice();

            });

            function totalAmountPrice() {
                var sum = 0;
                $(".sellingPrice").each(function () {
                    var value = $(this).val();
                    if (!isNaN(value) && value.length != 0) {

                        sum += parseFloat(value);
                    }

                });

                var discountValue = parseFloat($('#discountValue').val());
                if (!isNaN(discountValue) && discountValue.length != 0) {

                    sum -= parseFloat(discountValue);
                }

                $('#estimated_amount').val(sum);

            }
        });
    </script>

    <script type="text/javascript">


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $(document).on('change','#family',function (){
            var family= $(this).val();
            $.ajax({
                url:"{{route('get-product')}}",
                type:"GET",
                data:{family:family},
                success:function(data){
                    var html = '<option value ="">Select Category</option>';
                    $.each(data,function(key,v) {
                        html +='<option value=" '+v.code+' "> '+v.description+'</option>'
                    });
                    $('#product_id').html(html);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(textStatus, errorThrown);
                }
            })
        });


        $(function (){
            $(document).on('change','#product_id',function (){
                var product_id = $(this).val();
                $.ajax({
                    url:"{{route('check-product-stock')}}",
                    type :"GET",
                    data:{product_id:product_id},
                    success:function (data){
                        $('#current_stock_qty').val(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert(textStatus, errorThrown);
                    }
                })
            });
        });



    </script>






@endsection
