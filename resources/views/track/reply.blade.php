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
                      <h3 style="font-family:'Microsoft JhengHei'" class="box-title">回復追蹤表</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <form action="{{url('track/reply')}}/{{$track->id}}" method="post" role="form">
                          @csrf
                          <div class="form-group row">
                              <label class="col-xs-2">年度</label>
                              <label class="col-xs-10 text-left">{{$track->belongsToCheck->belongsToSchedule->belongsToProject->Year}}</label>
                          </div>
                          <div class="form-group row">
                              <label class="col-xs-2">因應計畫或興革方案</label>
                              <label class="col-xs-10">
                                <div class="form-group">
                                  <label >內容說明</label>
                                  <textarea class="ckeditor" id="test" name="content" placeholder=""></textarea>
                                </div>
                                <div class="form-group row">
                                  <label class="col-xs-12" >預定執行時程</label>
                                  <label class="col-xs-12 text-left">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker6'>
                                            <input type='text' class="form-control" name="schedule" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                  </label>
                                </div>
                                <div class="form-group">
                                  <label>預估成本</label>
                                  <textarea class="ckeditor" id="test1" name="cost" placeholder=""></textarea>
                                </div>
                                <div class="form-group">
                                  <label>預期效益</label>
                                  <textarea class="ckeditor" id="test2" name="benefit" placeholder=""></textarea>
                                </div>
                              </label>
                              <label class="col-xs-10 text-left"></label>
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
                      <h3 class="box-title" style=" font-family: 微軟正黑體;">內部稽核查檢事項</h3>
                  </div>
                  <div class="text-center">
                    <h4>查核項目</h4>
                  </div>
                  <div class="box-body">
                      {!!html_entity_decode($track->belongsToCheck->belongsToSchedule->Category)!!}
                  </div>
                  <div class="text-center">
                    <h4>內部稽核結論與建議事項</h4>
                  </div>
                  <div class="box-body">
                      {!!html_entity_decode($track->belongsToCheck->description)!!}
                  </div>
              </div>

          </div>
          <!--/.col (right) -->
      </div>
      <!-- /.row -->
      <script type="text/javascript">
          CKEDITOR.replace('test');
          CKEDITOR.replace('test1');
          CKEDITOR.replace('test2');
          $('#datetimepicker6').datetimepicker({
            format:"YYYY-MM-DD HH:mm:ss"
          });
      </script>
  </section>
@endsection
