@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Postal Code </h4><br><br>
                        <form method="post" action="{{route('postalCode.update')}}" id="myForm">
                            @csrf

                        <input type="hidden" name="id" value="{{$postalCode-> id}}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Código Postal</label>
                                <div class="form-group col-sm-10">
                                    <input name="postalCode" class="form-control" value="{{$postalCode->postalCode}}" type="text" onkeyup="showHint(this.value)">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="form-group row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Localidade</label>
                                <div class="col-sm-10">
                                    <input id="location" name="location" class="form-control" value="{{$postalCode->location}}" type="text">
                                    <script>
                                        function showHint(str) {
                                            if (str.length <8 && str.length!==4) {
                                                document.getElementById("location").placeholder = "Nenhuma sugestão";
                                                return;
                                            } else if(str.length===8 || str.length===4) {
                                                let xmlhttp = new XMLHttpRequest();
                                                xmlhttp.onreadystatechange = function() {
                                                    if(this.responseText.length<50) {
                                                        document.getElementById("location").value = this.responseText;
                                                    }else{
                                                        document.getElementById("location").placeholder = "Código-Postal Inválido";
                                                    }
                                                };
                                                xmlhttp.open("GET", "http://localhost/ERP4U/ERP4U/app/Http/Requests/ajaxRequests.php?p=" + str, true);
                                                xmlhttp.send();
                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                            <!-- end row -->

                            <script type="text/javascript">
                                $(document).ready(function (){
                                    $('#myForm').validate({
                                        rules: {
                                            postalCode: {
                                                required : true,
                                                regexPostalCode:'required postalCode',
                                            },
                                            location: {
                                                required : true,
                                            },
                                        },
                                        messages :{
                                            postalCode: {
                                                required : 'Please Enter a Postal Code.',
                                            },
                                            location: {
                                                required : 'Please Enter a Location',
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

                                    $.validator.addMethod("regexPostalCode", function(value, element)
                                    {
                                        return this.optional(element) || /^\d{4}-\d{3}?$/i.test(value);
                                    }, "Please enter a valid Postal Code, with format XXXX-XXX.");
                                });
                            </script>
                            <!--<div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input name="confirm_password" class="form-control" type="password"   id="confirm_password">
                                </div>
                            </div>
                             end row -->


                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Postal Code">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

@endsection
