<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Order Form</title>
        <!-- Google Font: Source Sans Pro -->
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
        />
        <!-- DataTables -->
        <link
            rel="stylesheet"
            href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"
        />
        <!-- Font Awesome Icons -->
        <link
            rel="stylesheet"
            href="/plugins/fontawesome-free/css/all.min.css"
        />
        <!-- Theme style -->
        <link rel="stylesheet" href="/dist/css/adminlte.min.css" />
    </head>
    <body>
        <div class="card">
            <div class="card-body">
                <h3 style="text-align: center;">Order Form (Waiter Panel)</h3>

                @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
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
                                            >Order Lists</a
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
                                                <select class="form-control w-25" name="table">
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
                                                @foreach($orders as $order)
                                                <tr>
                                                    <td>{{ $order->dish->name }}</td>
                                                    <td>{{ $order->table_id }}</td>
                                                    <td>{{ $status[$order->status] }}</td>
                                                    <td >
                                                    <div class="d-flex justify-content-center">
                                                        <a class="btn btn-success mr-2" href="/order/{{ $order->id }}/serve">Serve</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>

        <!-- REQUIRED SCRIPTS -->
        <!-- Bootstrap Js -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
        <!-- jQuery -->
        <script src="/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/dist/js/adminlte.min.js"></script>
        <!-- DataTables  & plugins -->
        <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="/plugins/jszip/jszip.min.js"></script>
        <script src="/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    </body>
</html>
