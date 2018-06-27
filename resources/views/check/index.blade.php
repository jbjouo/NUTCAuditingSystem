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
                        <a href="{{url('')}}" class="btn btn-block btn-default">新增查檢表</a>
                    </div>
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
                                        <th class="text-center" width="30%">稽核時程</th>
                                        <th class="text-center" width="30%">實際查核</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @csrf
                                    @foreach ($schedules as $schedule)
                                    <tr>
                                        <td class="text-center">{{$schedule->hasOneOffice->name}}</td>
                                        <td class="text-center">{{$schedule->Start_date}}~{{$schedule->End_date}}</td>
                                        <td class="text-center">
                                          @if ($schedule->hasOneCheck!=null)
                                            <a href="{{url('check/browse')}}/{{$schedule->hasOneCheck->id}}"><button class="btn btn-success">查看</button></a>
                                          @else
                                            <a href="{{url('check/create')}}/{{$schedule->id}}"><button class="btn btn-primary">建立</button></a>
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
        $('#a_search').attr("href", "{{url('check/index')}}/" + value);
        $('#a_search')[0].click();
    });
</script>

@endsection
