@extends('layouts.layout')
@section('content')
<section class="content-header">
  <center>
    <h2 style="font-family:'Microsoft JhengHei';">
      基本資料
    </h2>
  </center>
</section>
        <div class="row" style="width:400px; margin:0px auto; font-size:20px">
            <div class="box box-info ">
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                    <div class="box-body">
                        <br />
                        <div class="form-group">
                            <label class="col-sm-4 control-label">姓名</label>
                            <div class="col-sm-8">
                                <label class="control-label" style="font-weight:normal;">{{ Auth::user()->Name  }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">到職日期</label>

                            <div class="col-sm-8">
                                <label class="control-label" style="font-weight:normal;">{{$information->date_Arrival}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">電話</label>

                            <div class="col-sm-8">
                                <label class="control-label" style="font-weight:normal;">{{$information->phone}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">職位</label>

                            <div class="col-sm-8">
                                <label class="control-label" style="font-weight:normal;">
                                  {{$information->position}}
                                  @if ($information->position =="主管")
                                    @if (Auth::user()->Role==6)
                                      (未驗證)
                                    @else
                                      (驗證)
                                    @endif
                                  @endif
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">辦公室</label>

                            <div class="col-sm-8">
                                <label class="control-label" style="font-weight:normal;">{{$office[0]->name}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                      <a href="{{url('information/edit')}}" class="btn btn-primary" >修改</a>
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
        </div>

@endsection
