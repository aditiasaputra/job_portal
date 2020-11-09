@extends('layouts.main')

@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.css"/>
@endsection

@section('content')
    <div class="m-t-30">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row m-t-30">
                    <div class="col-md-12">
                        <h3 class="title-5 m-b-35">data employer</h3>
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table id="example" class="table table-borderless table-responsive-data2 table-data3">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>username</th>
                                        <th>email</th>
                                        <th>status</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employers as $employer)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $employer->name }}</td>
                                            <td>{{ $employer->username }}</td>
                                            <td>{{ $employer->email }}</td>
                                            <td class="active">Active</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection