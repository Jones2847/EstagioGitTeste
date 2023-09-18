@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Family </h4><br><br>
                            <form method="post" action="{{route('family.store')}}" id="myForm">
                                @csrf

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Family</label>
                                    <div class="form-group col-sm-10">
                                        <input name="family" class="form-control" type="text">
                                    </div>
                                </div>
                                <!-- end row -->



                                <!-- end row -->

                                <script type="text/javascript">
                                    $(document).ready(function (){
                                        $('#myForm').validate({
                                            rules: {
                                                family: {
                                                    required : true,

                                                },

                                            },
                                            messages :{
                                                family: {
                                                    required : 'Please Enter a Family.',
                                                },

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
                                    });
                                </script>


                                <!--<div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input name="confirm_password" class="form-control" type="password"   id="confirm_password">
                                    </div>
                                </div>
                                 end row -->


                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Family">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

@endsection
