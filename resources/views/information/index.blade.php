@extends('layouts.layout')
@section('content')
    <link rel="stylesheet" href="{{asset('/css/Auditing_Index.css')}}">
    <section class="content">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title" style="font-family: Microsoft JhengHei;">基本資料</h3>
                </div>
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
                                <label class="control-label" style="font-weight:normal;">{{$information[0]->date_Arrival}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">電話</label>

                            <div class="col-sm-8">
                                <label class="control-label" style="font-weight:normal;">{{$information[0]->phone}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">職位</label>

                            <div class="col-sm-8">
                                <label class="control-label" style="font-weight:normal;">{{$information[0]->position}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">辦公室</label>

                            <div class="col-sm-8">
                                <label class="control-label" style="font-weight:normal;">{{$office[0]->name}}</label>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
