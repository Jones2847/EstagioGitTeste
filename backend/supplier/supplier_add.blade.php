@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Postal Code </h4><br><br>

                            <form method="post" action="{{route('supplier.store')}}" id="myForm" >
                                @csrf

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Code</label>
                                    <div class="form-group col-sm-10">

                                        <input id="code" name="code" class="form-control" type="text">

                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="form-group row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input id="name" name="name" class="form-control" type="text" >
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Adress 1</label>
                                    <div class="col-sm-10">
                                        <input id="address1" name="address1" class="form-control" type="text" >
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Adress 2</label>
                                    <div class="col-sm-10">
                                        <input id="address2" name="address2" class="form-control" type="text" >
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Town</label>
                                    <div class="col-sm-10">
                                        <input id="town" name="town" class="form-control" type="text" >
                                    </div>
                                </div>


                                <div class="form-group row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">NIF</label>
                                    <div class="col-sm-10">
                                        <input id="nif" name="nif" class="form-control" type="text" >
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Postal Code</label>
                                    <div class="col-sm-10">
                                        <select id="postalCode" name="postalCode" aria-label="Default select example" >

                                            <option selected=""></option>
                                            @foreach($postalcodes as $supp)
                                                <option iLocation = "{{$supp -> location}}" value="{{$supp-> postalCode}}">
                                                    {{$supp-> postalCode}}
                                                </option>
                                            @endforeach




                                        </select>
                                    </div>
                                    <label for="example-text-input" id="lbLocation" name="lbLocation" class="col-sm-8 col-form-label"></label>
                                </div>

                                <!-- end row -->
                                <script type="text/javascript">

                                    $(document).ready(function (){
                                        $('#myForm').validate({
                                            rules: {
                                                code: {
                                                    required : true,
                                                },

                                                name: {
                                                    required : true,
                                                },

                                                address1: {
                                                    required : true,
                                                },
                                                address2: {
                                                    required : true,
                                                },
                                                town: {
                                                    required : true,
                                                },
                                                nif: {
                                                    required : true,
                                                },
                                                supplier_postalcode: {
                                                    required : true,
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
                                        $("#postalCode").change(function () {

                                            $("#lbLocation").text("");
                                            $("#lbLocation").text($("postalCode option:selected").attr("iLocation"));


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


                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Supplier">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

@endsection
