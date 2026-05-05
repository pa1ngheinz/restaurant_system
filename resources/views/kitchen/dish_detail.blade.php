@extends('layouts.master') @section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center mb-2">
                <div class="col-md-auto">
                    <h1 class="m-0">Dish Detail</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div
                class="row justify-content-center align-items-center"
                style="min-height: 70vh"
            >
                <div class="col-md-auto">
                    <!-- card -->
                    <div class="card" style="width: 18rem">
                        <img
                            src="{{ asset('images/'. $dish->image) }}"
                            class="card-img-top"
                            width="250" height="250"
                            alt="Unavailable"
                        />

                        <div class="card-body">
                            <h3 class="card-title fw-bold fs-2 text-uppercase">
                                {{ $dish->name }}
                            </h3>
                            <br />
                            <br />

                            <p class="card-text">
                                Category : {{ $dish->category->name }}
                            </p>

                            <p class="card-text">
                                Created :
                                {{ $dish->created_at->format('d M Y') }}
                            </p>

                            <a href="/dish" class="btn btn-primary">Back</a>
                            <a
                                href="/dish/{{ $dish->id }}/edit"
                                class="btn btn-primary"
                                >Edit</a
                            >
                        </div>
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
