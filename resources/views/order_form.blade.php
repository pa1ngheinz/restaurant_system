@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-auto">
                        <h1 class="m-0">Orders (Waiter Panel)</h1>
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
                            <div class="card-body">
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

                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if(session('empty'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('empty') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <!-- ./row -->
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-lg-12">
                                        <!-- Card -->
                                        <div class="card card-primary card-tabs">
                                            <div class="card-header p-0 pt-1">
                                                <ul
                                                    class="nav nav-tabs"
                                                    id="custom-tabs-one-tab"
                                                    role="tablist"
                                                >
                                                    <li class="nav-item">
                                                        <a
                                                            class="nav-link active"
                                                            id="custom-tabs-one-home-tab"
                                                            data-toggle="pill"
                                                            href="#custom-tabs-one-home"
                                                            role="tab"
                                                            aria-controls="custom-tabs-one-home"
                                                            aria-selected="true"
                                                            >New Order</a
                                                        >
                                                    </li>

                                                    <li class="nav-item">
                                                        <a
                                                            class="nav-link"
                                                            id="custom-tabs-one-profile-tab"
                                                            data-toggle="pill"
                                                            href="#custom-tabs-one-profile"
                                                            role="tab"
                                                            aria-controls="custom-tabs-one-profile"
                                                            aria-selected="false"
                                                            >Ordered Dishes</a
                                                        >
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="card-body">
                                                <div
                                                    class="tab-content"
                                                    id="custom-tabs-one-tabContent"
                                                >
                                                <div
                                                    class="tab-pane fade show active"
                                                    id="custom-tabs-one-home"
                                                    role="tabpanel"
                                                    aria-labelledby="custom-tabs-one-home-tab"
                                                >
                                                    <form action="{{ route('order.submit') }}" method="post">
                                                        @csrf
                                                        <div class="row">
                                                            @foreach($dishes as $dish)
                                                                <div class="col-lg-3">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <img src="{{ asset('images/' . $dish->image) }}" width="100" height="100"> <br>
                                                                            <label for="">{{ $dish->name }}</label> <br>
                                                                            <input type="number" name="{{ $dish->id }}" min="0">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                            
                                                        <div class="form-group">
                                                            <select class="form-control w-25" name="table" required>
                                                                <option value="" selected>Select Table</option>

                                                                @foreach($tables as $table)
                                                                    <option value="{{ $table->id }}">{{ $table->number }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                            </div>

                                            <div
                                                class="tab-pane fade"
                                                id="custom-tabs-one-profile"
                                                role="tabpanel"
                                                aria-labelledby="custom-tabs-one-profile-tab"
                                            >
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
                                                        @forelse($orders as $order)
                                                        <tr>
                                                            <td>{{ $order->dish->name }}</td>
                                                            <td>{{ $order->table_id }}</td>
                                                            <td>{{ $status[$order->status] }}</td>
                                                            <td >
                                                            <div class="d-flex justify-content-center">
                                                                <a class="btn btn-success mr-2" href="/order/{{ $order->id }}/serve">Serve</a>
                                                            </td>
                                                        </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="4">
                                                                    No dish has ready yet to show here!!
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>           
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection