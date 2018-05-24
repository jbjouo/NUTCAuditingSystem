@extends('layouts.layout')
@section('content')
  <section class="content-header">
          <center>
              <h2 style="font-family:'Microsoft JhengHei';">

                  年度內部稽核計畫
              </h2>
          </center>
      </section>
      <!-- Main content -->
      <section class="content">
          <div>
              <div>
                  <div class="box">
                      <!-- /.box-header -->
                      <div class="box-body">
                          <div class="btn-group" style="margin-bottom:10px;">
                            <a href="{{url('project/create')}}"><button type="button" name="button" class = "btn btn-block btn-default">新增計畫</button></a>
                          </div>
                          <div class="btn-group" style="margin-bottom:10px;">
                            <button type="button" name="button" class = "btn btn-block btn-default">黑暗大法術</button>
                          </div>
                          <table id="example2" class="table table-bordered table-hover">
                            <thead>
                              <th class="text-center" width="10%">年度</th>
                              <th class="text-center" width="10%">編號</th>
                              <th class="text-center" >稽核範圍</th>
                              <th class="text-center" >稽核重點</th>
                              <th class="text-center" width="10%">狀態</th>
                            </thead>
                            <tbody>
                              @if (true)
                                @foreach ($projects as $project)
                                  <tr>
                                    <td class="text-center">{{$project->Year}}</td>
                                    <td class="text-center">{{$project->Year}}-{{$project->Audit_class}}-{{$project->NumberOfYear}}</td>
                                    <td >{!!html_entity_decode($project->Audit_scope)!!}</td>
                                    <td >{!!html_entity_decode($project->Audit_focus)!!}</td>
                                    <td class="text-center">{{$project->Status}}</td>
                                  </tr>
                                @endforeach
                              @else
                                <tr>
                                  <td>目前未有年度計畫</td>
                                </tr>
                              @endif
                            </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </section>






@endsection
