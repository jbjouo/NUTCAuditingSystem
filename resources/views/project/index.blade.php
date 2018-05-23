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
                            <a href="{{url('project/create')}}"><button type="button" name="button" class = "btn btn-block btn-default">新增年度計畫</button></a>
                          </div>
                          <div class="btn-group" style="margin-bottom:10px;">
                            <button type="button" name="button" class = "btn btn-block btn-default">黑暗大法術</button>
                          </div>
                          <table id="example2" class="table table-bordered table-hover">
                            @if (false)
                              <tbody>
                                <tr>
                                  <td class="text-center" width="30%">年度</td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td class="text-center">編號</td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td class="text-center">稽核範圍</td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td class="text-center">稽核重點</td>
                                  <td></td>
                                </tr>
                              </tbody>
                            @else
                              <tr>
                                <td>目前未有稽核中年度計畫</td>
                              </tr>
                            @endif
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </section>






@endsection
