@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Product </h4><br><br>

                            <form method="post" action="{{route('product.update')}}" id="myForm" >
                                @csrf
                                <input type="hidden" name="id" value="{{$product-> id}}">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Code</label>
                                    <div class="form-group col-sm-10">

                                        <input id="code" name="code" class="form-control" type="text" value="{{$product->code}}" >

                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="form-group row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <input id="description" name="description" class="form-control" type="text" value="{{$product->description}}">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Product Image</label>
                                    <div class="col-sm-10">
                                        <input id="image" name="image" class="form-control" type="file">

                                    </div>
                                </div>


                                <div class="form-group row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{asset($product->image)}}">

                                    </div>
                                </div>



                                <div class="form-group row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Family</label>
                                    <div class="col-sm-10">
                                        <select id="product_family" name="product_family" aria-label="Default select example" >

                                            <option selected="selected">{{$product->product_family}}</option>
                                            @foreach($family as $prod)
                                                <option iOption = "" value="{{$prod-> family}}">
                                                    {{$prod-> family}}
                                                </option>
                                            @endforeach




                                        </select>
                                    </div>
                                    <label for="example-text-input" id="lbOption" name="lbOption" class="col-sm-8 col-form-label"></label>
                                </div>


                                <div class="form-group row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Unit</label>
                                    <div class="col-sm-10">
                                        <select id="product_unit" name="product_unit" aria-label="Default select example" >
                                            <option selected="selected">{{$product->product_unit}}</option>
                                            @foreach($unit_measure as $prod)
                                                <option iOption1 = "" value="{{$prod-> unit}}">
                                                    {{$prod-> unit}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="example-text-input" id="lbOption1" name="lbOption1" class="col-sm-8 col-form-label"></label>
                                </div>
                                <div class="form-group row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Tax Rate Code</label>
                                    <div class="col-sm-10">
                                        <select id="product_taxRateCode" name="product_taxRateCode" aria-label="Default select example" >
                                            <option selected="selected">{{$product->product_taxRateCode}}</option>
                                            @foreach($tax_rate as $prod)
                                                <option iOption1 = "" value="{{$prod-> taxRateCode}}">
                                                    {{$prod-> taxRateCode}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="example-text-input" id="lbOption1" name="lbOption1" class="col-sm-8 col-form-label"></label>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Quantity</label>
                                    <div class="col-sm-10">
                                        <input id="quantity" name="quantity" value="{{$product->quantity}}" class="form-control" type="text" >
                                    </div>
                                </div>

                                <script type="text/javascript">

                                    $(document).ready(function (){

                                        $('#image').change(function(e){
                                            var reader = new FileReader();
                                            reader.onload = function(e){
                                                $('#showImage').attr('src',e.target.result);
                                            }
                                            reader.readAsDataURL(e.target.files['0']);
                                        });



                                        $('#myForm').validate({
                                            rules: {
                                                code: {
                                                    required : true,
                                                },

                                                description: {
                                                    required : true,
                                                },

                                                image: {
                                                    required : true,
                                                },
                                                product_family: {
                                                    required : true,
                                                },
                                                product_unit: {
                                                    required : true,
                                                },
                                                product_taxRateCode: {
                                                    required : true,
                                                },

                                                quantity:{
                                                    required:true,
                                                },

                                            },
                                            messages :{

                                            },
                                            errorElement : 'span',
                                            errorPlacement: function (error,element) {
                                                error.addClass('invalid-feedback');
                                                element.closest('.form-group').append(error);
                                            },
                                            highlight : function(element, errorClass, validClass){
                                                $(element).addClass('is-invalid');
                                            },
                                            unhighlight : function(element, errorClass, validClass){
                                                $(element).removeClass('is-invalid');
                                            },
                                        });
                                        $("#product_family").change(function () {

                                            $("#lbOption").text("");
                                            $("#lbOption").text($("product_family option:selected").attr("iOption"));


                                        })
                                        $("#product_unit").change(function () {

                                            $("#lbOption1").text("");
                                            $("#lbOption1").text($("product_unit option:selected").attr("iOption1"));


                                        })
                                        $("#product_taxRateCode").change(function () {

                                            $("#lbOption2").text("");
                                            $("#lbOption2").text($("product_taxRateCode option:selected").attr("iOption2"));


                                        })


                                    });


                                </script>
                                <!--<div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input name="confirm_password" class="form-control" type="password"   id="confirm_password">
                                    </div>
                                </div>
                                 end row -->


                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Supplier">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

@endsection
