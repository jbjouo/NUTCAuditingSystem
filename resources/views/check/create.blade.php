@extends('layouts.layout')
@section('content')
<link rel=stylesheet type="text/css" href="{{asset('css/bootstrap-datetimepicker.css')}}">
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>
<section class="content">
    <div class="row">

        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
            <!-- /.box -->
            <!-- general form elements disabled -->
            <div class="box  box-info">
                <div class="box-header with-border">
                    <h3 style="font-family:'Microsoft JhengHei'" class="box-title">新增查檢表</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{url('check/create')}}/{{$schedule->id}}" method="post" role="form">
                        @csrf
                        <!-- text input -->
                        <input type="hidden" name="p_id" value="{{$project->id}}">
                        <div class="form-group row">
                            <label class="col-xs-2">年度</label>
                            <label class="col-xs-10 text-left">{{$project->Year}}</label>
                        </div>
                        <!-- textarea -->

                        <div class="form-group row">
                            <label class="col-xs-2">受查單位</label>
                            <label class="col-xs-10 text-left">
                              {{$schedule->hasOneOffice->name}}
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-xs-2">查核結果</label>
                            <label class="col-xs-10 text-left">
                              <select class="form-control" name="result">
                                <option value="1">YES</option>
                                <option value="0">NO</option>
                              </select>
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-xs-2">查核情形說明</label>
                            <label class="col-xs-10 text-left">
                              <textarea class="ckeditor" id="test" name="description" placeholder=""></textarea>
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-xs-2">佐證資料</label>
                            <label class="col-xs-10 text-left">
                              <textarea class="ckeditor" id="test1" name="supporting_information" placeholder=""></textarea>
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-xs-2">稽核人員</label>
                            <label class="col-xs-10 text-left">{{Auth::user()->Name}}</label>
                        </div>

                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary pull-right" value="送出" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">

            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title" style=" font-family: 微軟正黑體;">{{$schedule->hasOneOffice->name}}稽核計畫</h3>
                </div>
                <div class="box-body">
                    {!!html_entity_decode($schedule->Category)!!}<br/> {!!html_entity_decode($schedule->Focus)!!}
                </div>
            </div>

        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
    <script type="text/javascript">
        CKEDITOR.replace('test');
        CKEDITOR.replace('test1');
    </script>
</section>
@endsection
