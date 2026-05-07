<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Restaurant</title>
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

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ route('order.index') }}" class="brand-link">
                    <p
                        class="brand-text font-weight-light"
                        style="text-align: center; font-size: 30px; margin: 0"
                    >
                        Restaurant
                    </p>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img
                                src="{{ Auth::user()->image? asset('images/profile/'. Auth::user()->image): asset('images/profile/default.png') }}"
                                class="img-circle elevation-2"
                                alt="User Image"
                            />
                        </div>

                        <div class="info">
                            <a
                                href="#"
                                class="nav-link"
                                data-toggle="modal"
                                data-target="#profileModal"
                            >
                                {{ auth()->user()->name }}
                            </a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul
                            class="nav nav-pills nav-sidebar flex-column"
                            data-widget="treeview"
                            role="menu"
                            data-accordion="false"
                        >
                            <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                            <li class="nav-item menu-open">
                                <h3
                                    class="font-weight-light"
                                    style="
                                        color: white;
                                        text-align: start;
                                        margin-left: 15px;
                                        font-size: 20px;
                                    "
                                >
                                    Kitchen Panel
                                </h3>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a
                                            href="{{ route('dish.index') }}"
                                            class="nav-link {{ request()->segment(1) == 'dish'? 'active': '' }}"
                                        >
                                            <i
                                                class="far fa-circle nav-icon"
                                            ></i>
                                            <p>Dishes</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            href="{{ route('kitchen.order') }}"
                                            class="nav-link {{ request()->segment(1) == 'kitchen_order'? 'active': '' }}"
                                        >
                                            <i
                                                class="far fa-circle nav-icon"
                                            ></i>
                                            <p>Orders</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>

                    <hr />

                    <nav class="mt-2">
                        <ul
                            class="nav nav-pills nav-sidebar flex-column"
                            data-widget="treeview"
                            role="menu"
                            data-accordion="false"
                        >
                            <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                            <li class="nav-item menu-open">
                                <h3
                                    class="font-weight-light"
                                    style="
                                        color: white;
                                        text-align: start;
                                        margin-left: 15px;
                                        font-size: 20px;
                                    "
                                >
                                    Waiter Panel
                                </h3>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a
                                            href="{{ route('order.index') }}"
                                            class="nav-link {{ request()->segment(1) == 'order' || ''? 'active': '' }}"
                                        >
                                            <i
                                                class="far fa-circle nav-icon"
                                            ></i>
                                            <p>Orders</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            @yield('content')

            <!-- Profile Popup window -->
            <div
                class="modal fade"
                id="profileModal"
                tabindex="-1"
                role="dialog"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Profile</h5>
                            <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                            >
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/profile" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="text-center mb-3">
                                    <img
                                        src="{{ Auth::user()->image? asset('images/profile/'. Auth::user()->image): asset('images/profile/default.png') }}"
                                        class="rounded-circle"
                                        style="
                                            width: 100px;
                                            height: 100px;
                                            object-fit: cover;
                                        "
                                    />
                                </div>

                                <div class="form-group">
                                    <input
                                        type="file"
                                        name="image"
                                        class="form-control-file"
                                    />
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        value="{{ old('name', Auth::user()->name)}}"
                                    />
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        value="{{ old('email', Auth::user()->email)}}"
                                    />
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-dismiss="modal"
                                >
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ./Profile Popup window -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <div class="float-right d-none d-sm-inline">
                    <form action="logout" method="post">
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit">
                            Logout
                        </button>
                    </form>
                </div>

                <strong style="color: grey"
                    >Pa1ng Hein Kyaw &copy; 2026
                </strong>
            </footer>
        </div>
        <!-- ./wrapper -->

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
