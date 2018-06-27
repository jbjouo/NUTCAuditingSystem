@extends('layouts.layout')
@section('content')
  <section class="content-header text-center">
      <h2>內部稽核查檢表</h2>
  </section>
  <section class="content">
      <div class=" row ">
          <div class="col-xs-12">
              <div class="box " style="min-width:360px;">

                  <div class="box-header">
                      <div class=" btn-group btn_bottom ">
                          <a href="{{url('schedule/create')}}/" class="btn btn-block btn-default">新增查檢表</a>
                      </div>
                      <div class=" col-xs-offset-8"></div>
                      <br>
                      <div class="col-xs-7">

                          <div class="row">

                              <div class="col-md-6">
                                  <a id="a_search" href=""></a>
                                  <select class="project form-control" name="id">
                                    {{-- <option selected="selected" value="{{$project->id}}">{{$project->Year}}-AN-{{$project->NumberOfYear}}  {{$project->Status}}</option>
                                    <option value="{{$project->id}}">{{$project->Year}}-AN-{{$project->NumberOfYear}}  {{$project->Status}}</option> --}}
                              </select>
                              </div>
                              <div class="col-md-2 btn-group btn_bottom">
                                  <button id="search" class="btn btn-block btn-default">查看</button>
                              </div>
                          </div>

                      </div>
                      <br>
                      <br>
                  </div>
                  <div id="Data">
                      <div class="hold-transition skin-blue sidebar-mini" style="min-width:395px;">
                          <div class="box-body table-responsive no-padding">
                              <table class="table table-hover" id="Data">
                                  <thead>
                                      <tr>
                                          <th class="text-center" width="30%">受查單位</th>
                                          <th class="text-center" width="30%">查檢</th>
                                      </tr>
                                  </thead>
                                  <tbody id="schedule_content">
                                      <form class="notice" action="{{url('Schedule/notice')}}" method="post">
                                          @csrf
                                          <tr>

                                          </tr>
                                      </form>
                                  </tbody>
                              </table>
                              <div class="box-footer clearfix">
                                  <ul class="pagination pagination-sm no-margin pull-right">
                                  </ul>
                              </div>
                          </div>

                      </div>
                  </div>

              </div>
          </div>
      </div>
  </section>

@endsection
