@extends('layouts.layout')
@section('content')
<section class="content-header text-center">
    <h2 style="font-family:'Microsoft JhengHei';">內部稽核追蹤表</h2>
</section>
<section class="content">
    <div class=" row ">
        <div class="col-xs-12">
            <div class="box " style="min-width:360px;">

                <div class="box-header">
                    <div class=" col-xs-offset-8"></div>
                    <br>
                    <div class="col-xs-7">

                        <div class="row">

                            <div class="col-md-6">
                                <a id="a_search" href=""></a>
                                <select class="project form-control" name="id">
                                    @foreach ($projects as $project)
                                      @if ($p_id == $project ->id)
                                        <option selected="selected" value="{{$project->id}}">{{$project->Year}}-AN-{{$project->NumberOfYear}}</option>
                                      @else
                                        <option value="{{$project->id}}">{{$project->Year}}-AN-{{$project->NumberOfYear}}</option>
                                      @endif
                                    @endforeach
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
                                        <th class="text-center" width="30%">回復狀態</th>
                                        <th class="text-center" width="30%">管考建議</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @csrf
                                    @foreach ($checks as $check)
                                    <tr>
                                        <td class="text-center">{{$check->belongsToSchedule->hasOneOffice->name}}</td>
                                        <td class="text-center">
                                          @if ($check->hasOneTrack!=null)
                                            @if($check->hasOneTrack[0]->reply_time!=null)
                                              @if ($check->hasOneTrack[0]->result!=null)
                                                @if ($check->hasOneTrack[0]->result == "持續追蹤")
                                                  {{$check->hasOneTrack[0]->result}}(等待下次通知)
                                                @else
                                                  {{$check->hasOneTrack[0]->result}}
                                                @endif
                                              @else
                                                已回復
                                              @endif
                                            @else
                                              等待回復
                                            @endif
                                          @else
                                            尚未通知
                                          @endif
                                        </td>
                                        <td class="text-center">
                                          @if ($check->hasOneTrack[0]==null)
                                            <a href="{{url('track/create')}}/{{$check->id}}"><button class="btn btn-primary" type="button" name="button">通知</button></a>
                                          @else
                                            @if ($check->hasOneTrack[0]->result!=null)
                                              @if ($check->hasOneTrack[0]->result=="持續追蹤")
                                                <a href="{{url('track/create')}}/{{$check->id}}"><button class="btn btn-primary" type="button" name="button">通知</button></a>
                                              @else
                                                {{$check->hasOneTrack[0]->result}}
                                              @endif


                                            @else
                                              <a href="{{url('track/browse')}}/{{$check->hasOneTrack[0]->id}}"><button class="btn btn-success" type="button" name="button">查看</button></a>
                                            @endif

                                          @endif
                                        </td>
                                    </tr>
                                    @endforeach
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
    $('#search').click(function() {
        var value = $('select[name="id"]').val();
        $('#a_search').attr("href", "{{url('track/index')}}/" + value);
        $('#a_search')[0].click();
    });
</script>

@endsection
