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
                      <form class="" action="{{url('schedule/index')}}" method="post">
                        @csrf
                        <select  class="project" name="id">
                          @foreach ($projects as $project)
                            @if ($p_id == $project ->id)
                              <option selected="selected" value="{{$project->id}}">{{$project->Year}}-AN-{{$project->NumberOfYear}}  {{$project->Status}}</option>
                            @else
                              <option value="{{$project->id}}">{{$project->Year}}-AN-{{$project->NumberOfYear}}  {{$project->Status}}</option>
                            @endif
                          @endforeach
                        </select>
                        <div class=" btn-group btn_bottom">
                          <input class="btn btn-block btn-default" type="submit" value="搜尋">
                        </div>
                      </form>
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
                                        <th class="text-center" >全選  <input type="checkbox" name="all" onclick="check_all(this,'cb')" ></th>
                                        <th class="text-center" width="30%">受查單位</th>
                                        <th class="text-center" width="30%">稽核項次</th>
                                        <th class="text-center" width="30%">稽核項目</th>
                                    </tr>
                                </thead>
                                <tbody id="schedule_content">
                                  <form class="" action="" method="post">
                                    @foreach ($schedules as $schedule)
                                      <tr>
                                        <td class="text-center"><input type="checkbox" name="cb" value="{{$schedule->id}}"></td>
                                        <td class="text-center">{{$schedule->hasOneOffice->name}}</td>
                                        <td class="text-center">{{$schedule->O_id}}-{{$schedule->Item_project}}</td>
                                        <td class="text-center">{!!html_entity_decode($schedule->Category)!!}</td>
                                      </tr>
                                    @endforeach
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
<script type="text/javascript">
  function check_all(obj,cName)
  {
      var checkboxs = $("input[name="+cName+"]");
      for(var i=0;i<checkboxs.length;i++){checkboxs[i].checked = obj.checked;}
  }
</script>

@endsection
