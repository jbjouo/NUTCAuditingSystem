<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="Chrome">
    <title>稽核管理系統</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/icons/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('/css/ionicons.min.css')}}">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/Layout.css')}}">


    <!-- jQuery 3 -->
    <script src="{{asset('/js/jquery/jquery.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{asset('/js/jquery/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('/js/fastclick.js')}}"></script>
    <!-- AdminLTE for demo purposes -->

    <script src="{{asset('/js/demo.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/adminlte.min.js')}}"></script>


</head>

<body class="hold-transition skin-blue fixed sidebar-mini main">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header biglogo">
            <!-- Logo -->
            <a href="#" class="logo">
                    <span class="logo-mini"><img src="{{asset('/images/logo_mini.gif')}}" width="35"></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><img src="{{asset('/images/logo.gif')}}" width="170"></span>
                </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-bell-o"></i>
                              @if (Auth::user()->hasmanyNotification->where('isread',0)->count()!=0)
                                <span class="label label-warning" id="notice_num">
                                    {{Auth::user()->hasmanyNotification->where('isread',0)->count()}}
                                </span>
                              @endif
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header" id="notice_text">你有 {{Auth::user()->hasmanyNotification->where('isread',0)->count()}} 個新通知</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                      @foreach (Auth::user()->hasmanyNotification as $Notification)
                                        <li>
                                          <a href="{{url($Notification->url)}}">
                                              <i class="fa fa-users text-aqua"></i>{{$Notification->content}}
                                          </a>
                                        </li>
                                      @endforeach
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span >{{ Auth::user()->Name  }}</span>
                                </a>
                            <ul class="dropdown-menu ">
                                <!-- User image -->
                                <!-- Menu Body -->

                                <li class="user-body  col-xs-6">
                                    <div class="row text-center">


                                        <a href="{{url('information/index')}}">基本資料</a>


                                    </div>
                                    <!-- /.row -->
                                </li>
                                <li class="user-body col-xs-6">
                                    <div class="row text-center">

                                        <a href="{{ url('information/change') }}">修改密碼</a>

                                    </div>
                                    <!-- /.row -->
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a class="btn" href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">登出</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- =============================================== -->
        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header text-center">
                        <h4 class="main-title"><b>稽核管理系統</b></h4></li>
                    <li>
                        <a href="{{ url('NUTCAuditing') }}">
                                <i class="fa fa-home"></i>
                                <span>佈告欄</span>
                                <span class="pull-right-container">
                                </span>
                            </a>
                    </li>
                    <li class="treeview">
                        <a href="">
                                <i class="fa fa-user"></i> <span>基本資料設定</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('information/index')}}"><i class="fa fa-circle-o"></i>基本資料</a></li>
                            <li><a href="{{ url('information/change') }}"><i class="fa fa-circle-o"></i>修改密碼</a></li>
                        </ul>
                    </li>
                    @if (Auth::user()->Role == 5)
                    <li class="treeview">
                        <a href="#">
                                <i class="fa fa-lock"></i> <span>權限設定</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('verification')}}"><i class="fa fa-circle-o"></i>審核單位主管</a></li>
                            <li><a href="{{url('permission')}}"><i class="fa fa-circle-o"></i>更改身分權限</a></li>
                        </ul>
                    </li>
                    @endif
                    <li class="treeview active">
                        <a href="#">
                                <i class="fa fa-files-o"></i>
                                <span>稽核作業</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>

                        <ul class="treeview-menu">
                            <li><a href="{{url('project/index')}}"><i class="fa fa-circle-o"></i>稽核計畫</a></li>
                            <li><a href="{{url('schedule/index')}}"><i class="fa fa-circle-o"></i>內部稽核計畫表</a></li>
                            <li><a href="{{url('notice/index')}}"><i class="fa fa-circle-o"></i>內部稽核通知單</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i>稽核查檢表</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i>年度內部稽核報告表</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i>稽核追蹤控管表</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                                <i class="fa fa-pie-chart"></i>
                                <span>報表列印作業</span>
                                <span class="pull-right-container">
                                </span>
                            </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- =============================================== -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1 style="font-family: Microsoft JhengHei" ;></h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> 首頁</a></li>
                    <li><a href="#">稽核作業</a></li>
                    <li></li>
                </ol>
            </section>
            <section class="content">
                @yield('content')
            </section>
        </div>
    </div>
</body>

</html>
