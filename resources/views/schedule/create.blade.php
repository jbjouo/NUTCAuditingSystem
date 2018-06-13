@extends('layouts.layout')
@section('content')
<link rel=stylesheet type="text/css" href="{{asset('css/bootstrap-datetimepicker.css')}}">
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>

<form class="" action="{{url('schedule/create')}}/{{$project->id}}" method="post">
  @csrf

{{--
@using (Html.BeginForm("Add", "Internal_Audit_Schedule", new { Account = Model.member.Account, P_Id = Model.project.Id }, FormMethod.Post)) { --}}
<section class="content">
    <div class="row">

        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
            <!-- /.box -->
            <!-- general form elements disabled -->
            <div class="box  box-info">
                <div class="box-header with-border">
                    <h3 style="font-family:'Microsoft JhengHei'" class="box-title">新增計畫表</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form">
                        <!-- text input -->
                        <div class="form-group row">
                            <label class="col-xs-2">年度</label>
                            <label class="col-xs-10 text-left">{{$project->Year}}</label>
                        </div>
                        <!-- textarea -->

                        <div class="form-group row">
                            <label class="col-xs-2">受查單位</label>
                            <label class="col-xs-10 text-left">
                                  <select class="form-control" name="O_id">
                                    <option value="1">行政單位</option>
                                  </select>
                                </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-xs-2">查核項目</label>
                            <label class="col-xs-10 text-left">
                                  <textarea class="ckeditor" id="test" name="Category" placeholder=""></textarea>
                                 </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-xs-2">查核重點</label>
                            <label class="col-xs-10 text-left">
                                  <textarea class="ckeditor" id="test1" name="Focus" placeholder=""></textarea>
                                 </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-xs-2">開始日期</label>
                            <label class="col-xs-10 text-left">
                              <div class="form-group">
                                  <div class='input-group date' id='datetimepicker6'>
                                      <input type='text' class="form-control" name="start_date" />
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                  </div>
                              </div>
                            </label>
                        </div>

                        <div class="form-group row">
                            <label class="col-xs-2">結束日期</label>
                            <label class="col-xs-10 text-left">
                              <div class="form-group">
                                  <div class='input-group date' id='datetimepicker7'>
                                      <input type='text' class="form-control" name="end_date" />
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                  </div>
                              </div>
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-xs-2">稽核人員</label>
                            <label class="col-xs-10 text-left">{{Auth::user()->Name}}</label>
                        </div>

                        <div class="box-footer">
                            {{--
                            @Html.ValidationSummary() --}}
                            <input type="submit" class="btn btn-primary pull-right" value="送出" />

                        </div>
                        <!-- Select multiple-->
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
    <script type="text/javascript">
        CKEDITOR.replace('test');
        CKEDITOR.replace('test1');
        $(function () {
            $('#datetimepicker6').datetimepicker({
              format:"YYYY-MM-DD HH:mm:ss"
            });
            $('#datetimepicker7').datetimepicker({
                format:"YYYY-MM-DD HH:mm:ss",
                useCurrent: false //Important! See issue #1075
            });
            $("#datetimepicker6").on("dp.change", function (e) {
                $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepicker7").on("dp.change", function (e) {
                $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
            });
        });
    </script>
</section>
</form>
{{-- } --}}

@endsection
