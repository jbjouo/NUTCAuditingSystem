<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="Chrome"> 
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ asset('/css/icons/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/RegisterResult.css') }}">


    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/adminlte.min.js')}}"></script>
    <script src='{{asset('https://www.google.com/recaptcha/api.js')}}'></script>
    <script src="{{asset('/js/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/js/jquery/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('/js/jquery/fastclick.js')}}"></script>
    <script src="{{asset('/js/jquery/demo.js')}}"></script>

</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
        </div>
        <div class="register-box-body">
            <h2>
                <b>       
                    {{$message}}
                </b>
            </h2>



            
            <a href="{{asset('login')}}" class="text-center"> 點擊此以返回登入</a>
            <a href="{{asset('/register')}}" class="text-center"> 點擊此以重新註冊</a><br><br>
        </div>

    </div>
</body>
</html>

