<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>註冊</title>
    <link rel="stylesheet" href="{{ asset('/css/icons/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/Register.css') }}">


    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/adminlte.min.js')}}"></script>
    <script src='{{asset('https://www.google.com/recaptcha/api.js')}}'></script>
    <script src="{{asset('/js/jquery/jquery.min.js')}}"></script>
</head>

<body class="hold-transition register-page font">
    <div class="register-box">
        <div class="register-logo">
            <b>註冊</b>
        </div>
        <div class="register-box-body">
            <form action="{{url('/register')}}" method="post">

                @csrf
                <div class="form-group has-feedback">
                    <span class=" form-control-feedback"><i class="fa fa-user"></i></span>
                    <input type="text" class = "form-control" placeholder = "姓名" name="Name">
                </div>

                <div class="form-group has-feedback">
                    <span class="form-control-feedback"><i class="fa fa-user-circle"></i></span>
                    <input type="text" class = "form-control" placeholder = "帳號" name="Account">
                </div>

                <div class="form-group has-feedback">
                    <span class="form-control-feedback"><i class="fa fa-envelope-o"></i></span>
                    <input type="email" class = "form-control" placeholder = "信箱email" name="Email">
                </div>

                <div class="form-group has-feedback">
                    <span class="form-control-feedback"><i class="fa fa-lock"></i></span>
                    <input type="Password" class = "form-control" placeholder = "密碼" name="Password">
                </div>

                <div class="form-group has-feedback">
                    <span class="form-control-feedback"><i class="fa fa-lock"></i></span>
                    <input type="Password" class = "form-control" placeholder = "確認密碼" name="CheckPassword">
                </div>

                <div class="form-group has-feedback">
                    <p>{{ $errors ->register->first('Account')}}</p>
                    <p>{{ $errors ->register->first('Name')}}</p>
                    <p>{{ $errors ->register->first('Email')}}</p>
                    <p>{{ $errors ->register->first('Password')}}</p>
                    <p>{{ $errors ->register->first('CheckPassword')}}</p>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">送出</button>
                    </div>
                </div>
            </form>
            <a href="{{url('/login')}}" class="text-center">我已經是會員</a>
        </div>
    </div>
</body>
</html>
