@extends('layouts.layout')
@section('content')
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>
<link rel=stylesheet type="text/css" href="{{asset('css/bootstrap-datetimepicker.css')}}">
<div class="register-box">
        <div class="register-logo">
            <b>填寫基本資料</b>
        </div>
        <div class="register-box-body">
            <form action="{{url('information/edit')}}" method="post">
              @csrf
                <div class="form-group has-feedback row">
                    <label class="col-xs-3">姓名</label>
                    <label class="col-xs-9 text-left">
                      {{ Auth::user()->Name  }}
                    </label>
                </div>
                <div class="form-group has-feedback row">
                   <label class="col-xs-3">到職日期</label>
                    <label class="col-xs-9 text-left">
                      <div class='input-group date' id='datetimepicker6'>
                          <input type='text' class="form-control" name="date_Arrival" value="{{$information[0]->date_Arrival}}" />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                </div>
                <div class="form-group has-feedback row">
                    <label class="col-xs-3">電話</label>
                    <label class="col-xs-9 text-left">
                      <input type="text" name="phone" class = "form-control" value="{{$information[0]->phone}}" >
                    </label>

                </div>
                <div class="form-group has-feedback row">
                   <label class="col-xs-3">職位</label>
                   <label class="col-xs-9 text-left">
                     <select class="form-control" name="position">
                       <option value="主管">主管</option>
                       <option value="職員">職員</option>
                     </select>
                   </label>
                </div>
                <div class="form-group has-feedback row">
                    <label class="col-xs-3">辦公室</label>
                    <label class="col-xs-9 text-left">
                      <select class="form-control" name="o_id">
                        @foreach($offices as $office)
                        <option value="{{$office->id}}">{{$office->name}}</option>
                        @endforeach
                      </select>
                    </label>
                </div>
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
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker6').datetimepicker({
              format:"YYYY-MM-DD HH:mm:ss"
            });
          });
    </script>
@endsection
