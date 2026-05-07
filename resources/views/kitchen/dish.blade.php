@extends('layouts.master') @section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-auto">
                    <h1 class="m-0">Dishes (Kitchen Panel)</h1>
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
                        <div class="card-header">
                            <h3 class="card-title ">Dishes</h3>
                            <a href="{{ route('dish.create') }}" 
                            style="float: right;"
                            class="btn btn-success">Create dish</a>
                        </div>

                        <!-- /.card-body -->
                        <div class="card-body">
                            <!-- Flash Messages -->
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

                           @if(session('deleted'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('deleted') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if(session('updated'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('updated') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <table
                                id="dishes"
                                class="table table-bordered table-striped"
                            >
                                <thead>
                                    <tr>
                                        <th>Dish Name</th>
                                        <th>Category Name</th>
                                        <th>Created Time</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($dishes as $dish)
                                    <tr>
                                        <td>{{ $dish->name }}</td>
                                        <td>{{ $dish->category->name }}</td>
                                        <td>{{ $dish->created_at }}</td>
                                        <td >
                                           <div class="d-flex justify-content-center">
                                                 <a class="btn btn-default mr-2" href="{{ route('dish.show', $dish->id) }}">View</a>

                                                <form action="{{ route('dish.destroy', $dish->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-default" type="submit" onclick="return confirm('Are you sure to delete?')">
                                                        Delete 
                                                    </button>
                                                </form>
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
            searching: true,
            ordering: true,
            info: true,
        });
    });
</script>

@endsection

