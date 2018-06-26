@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="{{asset('css/Browse.css')}}">
<section class="content-header text-center">
    <h2>內部稽核計畫表</h2>
</section>
<section class="content">
    <div class=" row ">
        <div class="col-xs-12">
            <div class="box " style="min-width:360px;">

                <div class="box-header">
                    <div class=" btn-group btn_bottom ">
                      <a href="{{url('schedule/create')}}/{{$p_id}}" class = "btn btn-block btn-default">新增計畫表</a>
                    </div>
                    @if (DB::table('projects')->find($p_id)->Status=="公告中")
                      <div class=" btn-group btn_bottom pull-right">
                        <button id="notice" class = "btn btn-block btn-default">發送通知單</button>
                      </div>
                    @endif
                    <div class=" col-xs-offset-8"></div>
                    <br>
                    <div class="col-xs-7">

                        <div class="row">

                          <div class="col-md-6">
                            <a id ="a_search" href=""></a>
                            <select  class="project form-control" name="id">
                              @foreach ($projects as $project)
                                @if ($p_id == $project ->id)
                                  <option selected="selected" value="{{$project->id}}">{{$project->Year}}-AN-{{$project->NumberOfYear}}  {{$project->Status}}</option>
                                @else
                                  <option value="{{$project->id}}">{{$project->Year}}-AN-{{$project->NumberOfYear}}  {{$project->Status}}</option>
                                @endif
                              @endforeach
                            </select>
                          </div>


                          <div class="col-md-2 btn-group btn_bottom">
                            <button id ="search" class="btn btn-block btn-default">查看</button>
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
                                        <th class="text-center" >全選  <input type="checkbox" name="all" onclick="check_all(this,'cb')" ></th>
                                        <th class="text-center" width="30%">受查單位</th>
                                        <th class="text-center" width="30%">稽核項次</th>
                                        <th class="text-center" width="30%">稽核項目</th>
                                    </tr>
                                </thead>
                                <tbody id="schedule_content">
                                  <form class="notice" action="{{url('notice')}}" method="post">
                                    @csrf
                                    @foreach ($schedules as $schedule)
                                      <tr>
                                        <td class="text-center">
                                          @if (!$schedule->Issend)
                                              <input type="checkbox" name="cb[]" value="{{$schedule->id}}">
                                          @endif
                                        </td>
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
      var checkboxs = $("input[name='cb[]']");
      for(var i=0;i<checkboxs.length;i++){checkboxs[i].checked = obj.checked;}
  }
  $('#search').click(function() {
    var value = $('select[name="id"]').val();
    $('#a_search').attr("href", "{{url('schedule/index/')}}/"+value);
    $('#notice').attr("href", "{{url('schedule/create/')}}/"+value);
    $('#a_search')[0].click();
  });
  $('#notice').click(function(){
    $('form[class="notice"').submit();
  });
</script>

@endsection
