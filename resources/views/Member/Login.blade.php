<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>登入</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ asset('/css/icons/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/Login.css') }}">

    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/adminlte.min.js')}}"></script>
    <script src='{{asset('https://www.google.com/recaptcha/api.js')}}'></script>
    <script src="{{asset('/js/jquery/jquery.min.js')}}"></script>
</head>

<body class="hold-transition login-page font">
<div class="login-box">
    <div class="login-logo">
        <b>登入</b>
    </div>
    <!-- /.login-logo -->
    <form action="{{url('/login')}}" method="post">
        @csrf
        <div class="login-box-body">
            <p class="login-box-msg"></p>
            <div class="form-group has-feedback">
                <input type="text" class = "form-control" placeholder = "帳號" name="Account">
                <span class="form-control-feedback"><i class="fa fa-user-circle-o"></i></span>
            </div>
            <div class="form-group has-feedback">
                <input type="Password" class = "form-control" placeholder = "密碼" name="Password">
                <span class="form-control-feedback"><i class="fa fa-lock" aria-hidden="true"></i></span>
            </div>
            <div class="form-group has-feedback">
                <!--   <span class=" form-control-feedback"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>     -->

            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12 col-md-4 login_btn ">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">登入</button>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.social-auth-links -->
            <a href="#">忘記密碼</a>
            <br>
            <a href="{{url('/register')}}" class="text-center">加入會員</a>
        </div>
    </form>
    <!-- /.login-box-body -->
</div>
</body>
</html>
