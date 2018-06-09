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
                          <div class="pull-right btn-group" style="margin-bottom:10px;">
                              <a class="btn btn-block btn-default" href="" id="sendnotice" role="button">公告</a>
                          </div>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>




@endsection
