<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <script src="{{ asset('Admin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('Admin/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/vendor/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/dist/css/sb-admin-2.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/vendor/font-awesome/css/font-awesome.min.css') }}">
    <script src="{{ asset('Admin/vendor/jquery/jquery.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>





    <!-- MetisMenu CSS -->


    <!-- Custom CSS -->


    <!-- Custom Fonts -->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        @foreach(Auth::user()->unreadNotifications as $notification)

                        <li>

                            <a href="{{route('Msg.Read',['id'=>$notification->id])}}">
                                <div>
                                    <strong>{{$notification->data['name']}}</strong>
                                    <span class="pull-right text-muted">
                                        <em>{{$notification->created_at}}</em>
                                    </span>
                                </div>
                                <div>{{$notification->data['email']}}</div>
                            </a>
                        </li>
                        @endforeach
                        <li class="divider"></li>


                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="{{route('Msg.Index',['type'=>'All'])}}">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{route('Web.Profile')}}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>


                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="{{route('Section.Index')}}"><i class="fa fa-th fa-fw"></i>sections </a>
                        </li>
                        <li>
                            <a href="{{route('Image.Index')}}"><i class="fa fa-photo fa-fw"></i>Images </a>
                        </li>
                        <li>
                            <a href="{{route('Post.Index')}}"><i class="fa fa-building-o fa-fw"></i>Posts </a>
                        </li>
                        <li>
                            <a href="{{route('User.Index')}}"><i class="fa fa-users fa-fw"></i>Users </a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">@yield('title')</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @yield('contect')
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('Admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('Admin/vendor/metisMenu/metisMenu.min.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('Admin/dist/js/sb-admin-2.js') }}"></script>
    <script src="{{ asset('Admin/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('Admin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Admin/vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>


</body>

</html>
