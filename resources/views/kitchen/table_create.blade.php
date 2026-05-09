@extends('layouts.master') @section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Table (Kitchen Panel)</h1>
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
                            <h3 class="card-title">
                                Creating table
                            </h3>
                        </div>

                        <!-- /.card-body -->
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form action="{{ route('tables.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Table Number</label>
                                    <input
                                        class="form-control w-25"
                                        type="text"
                                        name="number"
                                        value="{{ old('name') }}"
                                    />
                                </div>

                                <a
                                href="{{ route('tables.index') }}"
                                class="btn btn-primary mr-2"
                                >Back</a
                                >

                                <button class="btn btn-primary" type="submit">Create</button>
                            </form>
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

@endsection
