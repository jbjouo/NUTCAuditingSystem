@extends('layouts.layout')
@section('content')
  <section class="content-header">
        <center><h2 style="font-family:'Microsoft JhengHei';">年度內部稽核計畫表</h2></center>
    </section>
  <section class="content">
          <div class="">
              <div class="">
                  <div class="box">
                      <!-- /.box-header -->
                      <div class="box-body">
                        <div class="pull-left">
                            <div class="btn-group" style="margin-bottom:10px;">
                              <a href="{{url('check/index')}}"><button class="btn btn-default" type="button" name="button">返回</button></a>

                            </div>
                        </div>
                          <div class="pull-right">
                              <div class="btn-group" style="margin-bottom:10px;">
                                <button class="btn btn-success" type="button" name="button">修改</button>
                              </div>
                          </div>
                          <table id="example2" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th width="7%" style="vertical-align:middle;text-align:center;white-space:nowrap">稽核項次</th>
                                <th class="text-center" width="23%" style="vertical-align:middle;text-align:center;white-space:nowrap">查核項目</th>
                                <th class="text-center" style="white-space:nowrap">查核重點</th>
                                <th class="text-center" width="17.5%" style="white-space:nowrap">查核結果</th>
                                <th class="text-center" width="17.5%" style="white-space:nowrap">查核情形說明</th>
                                <th class="text-center" width="17.5%" style="white-space:nowrap">佐證資料</th>
                              </tr>
                            </thead>
                              <tbody>
                                <tr>
                                  <td class="text-center">{{$check->belongsToSchedule->O_id}}-{{$check->belongsToSchedule->Item_project}}</td>
                                  <td class="text-center">{!!html_entity_decode($check->belongsToSchedule->Category)!!}</td>
                                  <td class="text-center">{!!html_entity_decode($check->belongsToSchedule->Focus)!!}</td>
                                  <td class="text-center">{{$check->result}}</td>
                                  <td class="text-center">{!!html_entity_decode($check->description)!!}</td>
                                  <td class="text-center"><a href="{{url('download')}}/{{$check->supporting_information}}">{{$check->supporting_information}}</a></td>
                                </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </section>

@endsection
