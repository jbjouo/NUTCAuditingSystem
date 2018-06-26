@extends('layouts.layout')
@section('content')
<div class="hold-transition skin-blue sidebar-mini">

    <section class="content-header">
        <center>
            <h2 style="font-family:'Microsoft JhengHei';">{{$project->Year}} 年度內部稽核計畫</h2></center>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div>
                          <div class="pull-left btn-group" style="margin-bottom:10px;">
                              <a class="btn btn-block btn-default" href="{{url('project/index')}}" id="sendnotice" role="button">返回</a>
                          </div>
                          @if ($project->Status=='未稽核')
                            <div class="pull-right btn-group" style="margin-bottom:10px;">
                                <a class="btn btn-block btn-default" href="{{url('project/announcement')}}/{{$project->id}}" id="sendnotice" role="button">公告</a>
                            </div>
                          @endif
                          <div class="pull-right btn-group" style="margin-bottom:10px;">
                              <a class="btn btn-block btn-primary" href="" id="sendnotice" role="button">修改</a>
                          </div>


                        </div>

                        <table id="example2" class="table table-bordered table-hover">

                            <tbody>
                                <tr>
                                    <th class="text-center" width="10%" style="white-space:nowrap">編號</th>
                                    <td>{{$project->Year}}-{{$project->Audit_class}}-{{$project->NumberOfYear}}</td>
                                    <th class="text-center" style="white-space:nowrap">稽核狀態</th>
                                    <td style="word-break:break-all">{{$project->Status}}</td>
                                </tr>
                                <tr>
                                    <th class="text-center" style="white-space:nowrap">範圍</th>
                                    <td colspan="3" style="word-break:break-all">{!!html_entity_decode($project->Audit_scope)!!}</td>
                                </tr>
                                <tr>
                                    <th class="text-center" style="white-space:nowrap">重點</th>
                                    <td colspan="3" style="word-break:break-all">{!!html_entity_decode($project->Audit_focus)!!}</td>
                                </tr>
                                <tr>
                                    <th class="text-center" style="white-space:nowrap">項目及期望</br>(稽核計畫表)</th>
                                    <td colspan="3" style="word-break:break-all">
                                      <div class="row">
                                        <div class="col-md-12 col-xs-12 col-sm-12 navbar-text" >
                                          <div class="row">
                                            <div class="col-md-10 col-xs-10 col-sm-10 text-center">
                                              完成度
                                            </div>
                                            @if ($Percent != 100)
                                              <div class="col-md-1 col-xs-12" >
                                                <a href="{{url('schedule/create/')}}/{{$project->id}}">
                                                  <button class="btn btn-block btn-default"style="width:80px;"  type="button" name="button">新增</button>
                                                </a>
                                              </div>
                                            @endif
                                          </div>

                                        </div>
                                        <div class="col-md-12 col-xs-12">

                                          <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="{{$Percent}}" aria-valuemin="0" aria-valuemax="100" style="min-width: 3em;width: {{$Percent}}%;">
                                              {{$Percent}}%
                                            </div>
                                          </div>
                                        </div>
                                          <div class="navbar-text col-md-10 col-xs-10 text-center">
                                            受查單位
                                          </div>
                                        @foreach ($schedules as $schedule)
                                          <div class="col-md-12 col-xs-12">
                                            <div class="navbar-text">
                                              <span class="label label-primary">{{$schedule->Item_project}}</span>
                                              <a href="#">{{$schedule->hasOneOffice->name}}</a>
                                            </div>
                                          </div>
                                        @endforeach

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
</div>




@endsection
