@extends('layouts.layout')
@section('content')
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>
<link rel=stylesheet type="text/css" href="{{asset('css/bootstrap-datetimepicker.css')}}">
<div class="register-box">
        <div class="register-logo">
            <b>修改密碼</b>
        </div>
        <div class="register-box-body">
            <form action="{{url('information/change')}}" method="post">
              @csrf
                <div class="form-group has-feedback row">
                    <label class="col-xs-3">舊密碼</label>
                    <label class="col-xs-9 text-left">
                      <input type="text" name="old" >
                    </label>

                </div>
                <div class="form-group has-feedback row">
                   <label class="col-xs-3">新密碼</label>
                    <label class="col-xs-9 text-left">
                      <input type="text" name="new" >
                    </label>
                </div>
                <div class="form-group has-feedback row">
                   <label class="col-xs-3">新密碼確認</label>
                    <label class="col-xs-9 text-left">
                      <input type="text" name="newcheck" >
                    </label>
                </div>
                @if ($errors->has('old'))
                    <p class="invalid-feedback">
                        <strong>{{ $errors->first('old') }}</strong>
                    </p>
                @endif
                @if ($errors->has('new'))
                    <p class="invalid-feedback">
                        <strong>{{ $errors->first('new') }}</strong>
                    </p>
                @endif
                @if ($errors->has('newcheck'))
                    <p class="invalid-feedback">
                        <strong>{{ $errors->first('newcheck') }}</strong>
                    </p>
                @endif
                
                <!-- /.col -->
                <div class="row">

                    <div class="col-xs-12 col-md-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">送出</button>
                    </div>
                    <!-- /.col -->
                </div>


            </form>
        </div>

        <!-- /.form-box -->
    </div>
@endsection
