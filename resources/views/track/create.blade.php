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
                      <h3 style="font-family:'Microsoft JhengHei'" class="box-title">發送追蹤通知單</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <form action="{{url('track/create')}}/{{$c_id}}" method="post" role="form">
                        @csrf
                        <div class="form-group row">
                            <label class="col-xs-2">單位</label>
                            <label class="col-xs-10 text-left">行政單位</label>
                        </div>
                        <div class="form-group row">
                            <label class="col-xs-2">回覆期限</label>
                            <label class="col-xs-10 text-left">
                              <div class="form-group">
                                  <div class='input-group date' id='datetimepicker6'>
                                      <input type='text' class="form-control" name="deadline" />
                                      <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                      </span>
                                  </div>
                              </div>
                            </label>
                        </div>

                          <div class="box-footer">
                              <input type="submit" class="btn btn-primary pull-right" value="送出" />
                          </div>
                      </form>
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
<script type="text/javascript">
  $(function () {
      $('#datetimepicker6').datetimepicker({
        format:"YYYY-MM-DD HH:mm:ss"
      });
  });
</script>
@endsection
