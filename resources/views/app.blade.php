<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://api.urbanitsolution.com/web_content/css/bootstrap-select.css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <!-- <i class="fas fa-user"></i> -->
                    <!-- <i class="fas fa-user-cog"></i> -->
                    <img src="{{ asset('img/logo2.png') }}" alt="Custom Logo" height="60px" width="100px">
                </div>

            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            @auth
            @if(auth()->user()->hasRole('admin'))
            <li class="nav-item">
                <a class="nav-link" href="/admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Admin Panel</span></a>
            </li>
            @endif
            @endauth


            @auth
            @if(auth()->user()->hasRole('student'))
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>User Panel</span></a>
            </li>
            @endif
            @endauth
            <!-- //////////////////////////////////////////////// -->
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Modules
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            @auth
            @if(auth()->user()->hasRole('admin'))

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-user fa-10x"></i>
                    <span>User Management</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="/users">View user list</a>
                        <a class="collapse-item" href="/students">View students list</a>
                        <!-- <a class="collapse-item" href="/user_informations">View students Information</a> -->
                    </div>
                </div>
            </li>
            @endif
            @endauth

            @auth
            @if(auth()->user()->hasRole('admin'))

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-building"></i>
                    <span>Room Management</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/building">View Building list</a>
                        <a class="collapse-item" href="/floors">View Floor list</a>
                        <a class="collapse-item" href="/rooms">View room list</a>
                        <a class="collapse-item" href="/seats">View seat list</a>
                        <a class="collapse-item" href="/allocations">Room and Seat allocation</a>


                    </div>
                </div>
            </li>
            @endif
            @endauth
            <!-- Nav Item - Utilities Collapse Menu -->

            <!-- //////-----------------///////////////// -->
            @auth
            @if(auth()->user()->hasRole('student'))
            <li class="nav-item">
                <a class="nav-link" href="/user_informations/create">
                    <i class="far fa-user"></i>
                    <span>Add Personal Information</span></a>
            </li>
            @endif
            @endauth

            <!-- @auth
            @if(auth()->user()->hasRole('student'))
            <li class="nav-item">
                <a class="nav-link" href="/user_guardian_informations/create">
                    <i class="far fa-user"></i>
                    <span>Add Gurdian Information</span></a>
            </li>
            @endif
            @endauth -->

<!-- ////////////////-------------------//////////////// -->
            @auth
            @if(auth()->user()->hasRole('student'))
            <li class="nav-item">
                <a class="nav-link" href="/user_informations">
                    <i class="fas fa-info-circle"></i>
                    <span>View Personal Information</span></a>
            </li>
            @endif
            @endauth

<!-- //////--------------------////////////////// -->

@auth
            @if(auth()->user()->hasRole('student'))
            <li class="nav-item">
                <a class="nav-link" href="/availableRooms">
                    <i class="fas fa-home"></i>
                    <span>Available Rooms</span></a>
            </li>
            @endif
            @endauth
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-utensils"></i>
                    <span>Meal Management</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/meals">View meal list.</a>
                        <a class="collapse-item" href="/menues">View weekly menu.</a>
                        @auth
                        @if(auth()->user()->hasRole('admin'))
                        <a class="collapse-item" href="/meal_allocation">View allocated meals</a>
                        <a class="collapse-item" href="/meal_allocation/create">Assign meals to users.</a>
                        @endif
                        @endauth
                    </div>
                </div>
            </li>
            @auth
            @if(auth()->user()->hasRole('admin'))
            <li class="nav-item">
                <a class="nav-link" href="/plans">
                    <i class="far fa-calendar-alt"></i>
                    <span>Plans</span></a>
            </li>
            @endif
            @endauth

<!-- ------------------------new section plan------------------------------------ -->
            @auth
            @if(auth()->user()->hasRole('student'))
            <li class="nav-item">
                <a class="nav-link" href="/select_plans/create">
                    <i class="far fa-calendar-alt"></i>
                    <span>Secect a plan</span></a>
            </li>
            @endif
            @endauth



            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Pages Collapse Menu -->


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        

                        
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src=" {{ asset('img/user.png') }}">

                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a> -->
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="#" onclick="document.getElementById('logoutForm').submit();">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </form>

                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; CozyHome 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

    <!-- bootstrap select--->
    <script src="https://atik.urbanitsolution.com/web_content/js/bootstrap-select.js"></script>


    <script>

$(document).ready(function() {
    $('.selectpicker').selectpicker();
});
    </script>
<!-- /////////////////code for building and floor dependency -->
    <script>
        $(document).ready(function () {
    $.ajax({
        url: '/buildings-fetch',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            // Handle the retrieved data
           var selectElement = $("#building_id");
            $.each(data, function (index, option) {
        selectElement.append('<option value="' + option.id + '">' + option.building_name + '</option>');
    });
        },
        error: function (error) {
            console.error('Error fetching data:', error);
        }
    });
});
    </script>
    
    

    <script>
        
        $(document).ready(function () {
            $('#building_id').on('change', function () {

        var selectBuilding = $(this).val();
        var selectElement = $("#floor_id");
        if(selectBuilding==='')
        {
            selectElement.empty();
        }
        else{

         $.ajax({
        url: '/floors-fetch/'+selectBuilding,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
           
           selectElement.empty();
            $.each(data, function (index, option) {
        selectElement.append('<option value="' + option.id + '">' + option.floor_number + '</option>');
    });
        },
        error: function (error) {
            console.error('Error fetching data:', error);
        }
    });

        }

       
    });
   
});

    </script>


<!-- /////////////////code for room and seat dependency -->

<!-- <script>
        $(document).ready(function () {
    $.ajax({
        url: '/rooms-fetch',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            // Handle the retrieved data
           var selectElement = $("#room_id");
            $.each(data, function (index, option) {
        selectElement.append('<option value="' + option.id + '">' + option.room_number + '</option>');
    });
        },
        error: function (error) {
            console.error('Error fetching data:', error);
        }
    });
});
    </script>


<script>
        
        $(document).ready(function () {
            $('#room_id').on('change', function () {

        var selectRoom = $(this).val();
        var selectElement = $("#seat_id");
        if(selectRoom==='')
        {
            selectElement.empty();
        }
        else{

         $.ajax({
        url: '/seats-fetch/'+selectRoom,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
           
           selectElement.empty();
            $.each(data, function (index, option) {
        selectElement.append('<option value="' + option.id + '">' + option.seat_number + '</option>');
    });
        },
        error: function (error) {
            console.error('Error fetching data:', error);
        }
    });

        }

       
    });
   
});

    </script> -->



  <script>


   


  </script>





</body>

</html>