@extends('layouts.master') @section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Creating Dishes (Kitchen Panel)</h1>
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
                                Making a delicious dish..
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

                            <form action="{{ route('dish.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="name"
                                        value="{{ old('name') }}"
                                    />
                                </div>

                                <div class="form-group">
                                    <label for="category">Category</label> <br>
                                    <select name="category">
                                        <option value="">
                                            Select Category
                                        </option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div> 

                                <div class="form-group">
                                    <label for="dish_image">Imgae</label> <br>
                                    <input
                                        type="file"
                                        name="dish_image"
                                    />
                                </div> <br><br>

                                <a
                                href="{{ route('dish.index') }}"
                                class="btn btn-primary mr-2"
                                >Back</a
                                >

                                <button class="btn btn-primary" type="submit">Done</button>
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
