@extends('admin.admin_master')
@section('admin')





    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Statistics of ERP4U</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" >
                            <h4 class="card-title"></h4>

                            <div id="chart" class="chart"></div>

                            <div id="chartBar" class="chartBar"></div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script type="text/javascript">


        var options = {


            series: [


                @foreach($products as $product)
                {{$product->quantity}},
                @endforeach


            ],

            labels:[

                @foreach($products as $prod)


                    "{{$prod->description}}",
                @endforeach

            ],

            plotOptions :{
                pie:{
                    donut:{
                       labels:{
                           show:true,

                           total:{
                               show:true,
                           }
                       }
                    }
                }
            },

            chart: {
                type: 'donut',
            },
            responsive: [{
                breakpoint: 480,
                options: {

                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();


    </script>


@endsection



@foreach($purchaseOrdersC as $po)

    {
    x: '{{$po->pODate}}',
    y: 1292,
    goals: [
    {
    name: 'Expected',
    value: 1400,
    strokeHeight: 5,
    strokeColor: '#775DD0'
    }
    ]
    },
@endforeach
