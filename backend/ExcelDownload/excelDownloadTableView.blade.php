@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Search Querry Result </h4>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Table 1 Column 1</th>
                                    <th>Table 1 Column 3</th>
                                    <th>Table 1 Column 4</th>
                                    <th>Table 1 Column 5</th>
                                    <th>Table 1 Column 6</th>
                                    <th>Table 1 Column 7</th>
                                    <th>Table 1 Column 8</th>
                                    <th>Table 1 Column 9</th>
                                    <th>Table 1 Column 10</th>
                                    <th>Table 1 Column 11</th>
                                    <th>Table 1 Column 12</th>
                                    <th>Table 1 Column 13</th>

                                    <th>Table 2 Column 1</th>
                                    <th>Table 2 Column 3</th>
                                    <th>Table 2 Column 4</th>
                                    <th>Table 2 Column 5</th>
                                    <th>Table 2 Column 6</th>
                                    <th>Table 2 Column 7</th>
                                    <th>Table 2 Column 8</th>
                                    <th>Table 2 Column 9</th>
                                    <th>Table 2 Column 10</th>
                                    <th>Table 2 Column 11</th>
                                    <th>Table 2 Column 12</th>
                                    <th>Table 2 Column 13</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{ $item->table1_column1 }}</td>
                                        <td>{{ $item->table1_column2 }}</td>
                                        <td>{{ $item->table1_column3 }}</td>
                                        <td>{{ $item->table1_column4 }}</td>
                                        <td>{{ $item->table1_column5 }}</td>
                                        <td>{{ $item->table1_column6 }}</td>
                                        <td>{{ $item->table1_column7 }}</td>
                                        <td>{{ $item->table1_column8 }}</td>
                                        <td>{{ $item->table1_column9 }}</td>
                                        <td>{{ $item->table1_column10 }}</td>
                                        <td>{{ $item->table1_column11 }}</td>
                                        <td>{{ $item->table1_column12 }}</td>
                                        <td>{{ $item->table1_column13 }}</td>


                                        <td>{{ $item->table2_column1 }}</td>
                                        <td>{{ $item->table2_column2 }}</td>
                                        <td>{{ $item->table2_column3 }}</td>
                                        <td>{{ $item->table2_column4 }}</td>
                                        <td>{{ $item->table2_column5 }}</td>
                                        <td>{{ $item->table2_column6 }}</td>
                                        <td>{{ $item->table2_column7 }}</td>
                                        <td>{{ $item->table2_column8 }}</td>
                                        <td>{{ $item->table2_column9 }}</td>
                                        <td>{{ $item->table2_column10 }}</td>
                                        <td>{{ $item->table2_column11 }}</td>
                                        <td>{{ $item->table2_column12 }}</td>
                                        <td>{{ $item->table2_column13 }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
