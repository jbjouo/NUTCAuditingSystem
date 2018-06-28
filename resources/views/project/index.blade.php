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
              <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="btn-group" style="margin-bottom:10px;">
                          <a href="{{url('project/create')}}"><button type="button" name="button" class = "btn btn-block btn-default">新增計畫</button></a>
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
                                  <tr style="cursor: pointer;"  class = "project p_{{$project->id}}" p_id="{{$project->id}}">
                                    <a  id ="a_{{$project->id}}"   href="{{url('project/browse/')}}/{{$project->id}}"></a>
                                    <td class="text-center">{{$project->Year}}</td></a>
                                    <td class="text-center">{{$project->Year}}-{{$project->Audit_class}}-{{$project->NumberOfYear}}</td>
                                    <td class="limit_word" >{!!html_entity_decode($project->Audit_scope)!!}</td>
                                    <td class="limit_word">{!!html_entity_decode($project->Audit_focus)!!}</td>
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
    </section>
    <div class="123a">

    </div>

    <script type="text/javascript">
      $('.project').click(function() {
        var id = $(this).attr("p_id");

        if ($(this).hasClass('p_'+id)) {
          document.getElementById("a_"+id).click();
        }
      });
      var $len = 30; // 超過50個字以"..."取代
          $(".limit_word").each(function(){
              if($(this).text().length > $len){
                  var $text=$(this).text().substring(0,$len-1)+"...";
                  $(this).text($text);
              }
          });
    </script>
@endsection
