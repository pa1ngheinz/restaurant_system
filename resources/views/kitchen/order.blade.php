@extends('layouts.master') @section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-auto">
                    <h1 class="m-0">Orders (Kitchen Panel)</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        @if(session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if(session('profile_updated'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('profile_updated') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="card-header">
                            <h3 class="card-title ">Orders</h3>
                        </div>

                        <!-- /.card-body -->
                        <div class="card-body">
                            <table
                                id="dishes"
                                class="table table-bordered table-striped"
                            >
                                <thead>
                                    <tr>
                                        <th>Dish Name</th>
                                        <th>Table No</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->dish->name }}</td>
                                        <td>{{ $order->table_id }}</td>
                                        <td>{{ $status[$order->status] }}</td>
                                        <td >
                                           <div class="d-flex justify-content-center">
                                                 <a class="btn btn-default mr-2" href="/kitchen_order/{{ $order->id }}/approve">Approve</a>
                                                 <a class="btn btn-default mr-2" href="/kitchen_order/{{ $order->id }}/cancel">Cancel</a>
                                                 <a class="btn btn-default" href="/kitchen_order/{{ $order->id }}/ready">Ready</a>
                                           </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- JQuery, DataTables and Scripts-->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    $(function () {
        $("#dishes").DataTable({
            paging: true,
            pageLength: 5,
            lengthChange: false,
            searching: false,
            ordering: true,
            info: true,
        });
    });
</script>

@endsection

