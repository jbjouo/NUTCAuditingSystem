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
                              <a href="{{url('track/index')}}"><button class="btn btn-default" type="button" name="button">返回</button></a>
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
                                <th rowspan="2"  width="7%" style="vertical-align:middle;text-align:center;white-space:nowrap">查核項目</th>
                                <th rowspan="2" class="text-center" width="23%" style="vertical-align:middle;text-align:center;white-space:nowrap">內部稽核結論與建議事項</th>
                                <th colspan="4" class="text-center" style="white-space:nowrap">因應計畫與興革方案</th>
                              </tr>
                              <tr>
                                <th class="text-center" width="17.5%" style="white-space:nowrap">內容說明</th>
                                <th class="text-center" width="17.5%" style="white-space:nowrap">預定執行時程</th>
                                <th class="text-center" width="17.5%" style="white-space:nowrap">預估成本</th>
                                <th class="text-center" width="17.5%" style="white-space:nowrap">預期效益</th>
                              </tr>
                            </thead>
                              <tbody>
                                <tr>
                                  <td class="text-center">{!!html_entity_decode($track->belongsToCheck->belongsToschedule->Category)!!}</td>
                                  <td class="text-center">{!!html_entity_decode($track->belongsToCheck->description)!!}</td>
                                  <td class="text-center">{!!html_entity_decode($track->content)!!}</td>
                                  <td class="text-center">{{$track->schedule}}</td>
                                  <td class="text-center">{!!html_entity_decode($track->cost)!!}</td>
                                  <td class="text-center">{!!html_entity_decode($track->benefit)!!}</td>
                                </tr>
                                <tr>
                                  <td class="text-center">管考建議:</td>
                                  <td colspan="5">
                                    <div class="row">
                                      <form class="" action="{{url('track/end')}}/{{$track->id}}" method="post">
                                        @csrf
                                        <div class="col-md-4">
                                          <select class="form-control" name="result">
                                            <option value="持續追蹤">持續追蹤</option>
                                            <option value="列入次年度內部稽核查核事項">列入次年度內部稽核查核事項</option>
                                            <option value="結案">結案</option>
                                          </select>
                                        </div>
                                        <div class="col-md-4">
                                          <input class="btn btn-default" type="submit" value="完成">
                                        </div>
                                      </form>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </section>
@endsection
