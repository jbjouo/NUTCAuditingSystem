@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="~/Content/Browse.css">
<section class="content-header text-center">
    <h2>內部稽核計畫表</h2>
</section>
<section class="content">
    <div class=" row ">
        <div class="col-xs-12">
            <div class="box " style="min-width:360px;">

                <div class="box-header">
                    <div class=" btn-group btn_bottom ">
                      <a href="{{url('schedule/create')}}" class = "btn btn-block btn-default">新增計畫表</a>
                    </div>
                    <div class=" btn-group btn_bottom pull-right">
                      <a href="{{url('#')}}" class = "btn btn-block btn-default">發送通知單</a>
                    </div>
                    <div class=" col-xs-offset-8"></div>
                    <br>
                    <div class="col-xs-7">
                      <select  class="project" name="">
                        @foreach ($projects as $project)
                          <option value="{{$project->id}}">{{$project->Year}}-AN-{{$project->NumberOfYear}}  {{$project->Status}}</option>
                        @endforeach
                      </select>
                      <div class=" btn-group btn_bottom">
                        <button class="btn btn-block btn-default" type="button" name="search">搜尋</button>
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
                                        <th width="25%">受查單位</th>
                                        <th width="25%">稽核項次</th>
                                        <th width="25%">稽核項目</th>
                                        <th width="25%">內容</th>
                                    </tr>
                                </thead>
                                <tbody id="schedule_content">

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
<meta name="_token" content="{{ csrf_token() }}"/>
<script type="text/javascript">
  // $('button[name="search"]').click(function(){
  //   var id = $('.project').val();
  //   getschedule(id);
  // });
  //
  //
  // function getschedule(id){
  //   $.ajax({
  //     type : 'post',
  //     url : "{{url('schedule/getschedule')}}",
  //     data : {
  //       id:id,
  //     },
  //     dataType : 'json',
  //     headers: {
  //       'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  //     },
  //     success: function (data) {
  //       $('#schedule_content').empty();
  //       $("#schedule_content").append("<tr>");
  //       for(var key in data.schedules){
  //         $("#schedule_content").append("<td>"+data.schedules[key].O_id+"</td>");
  //         $("#schedule_content").append("<td>"+data.schedules[key].O_id+"</td>");
  //         $("#schedule_content").append("<td>"+data.schedules[key].Category+"</td>");
  //         $("#schedule_content").append("<td>"+data.schedules[key].O_id+"</td>");
  //       }
  //       $("#schedule_content").append("</tr>");
  //     },
  //     error: function(xhr, type){
  //       alert('出錯惹！');
  //     }
  //   });
  // }

</script>

@endsection
