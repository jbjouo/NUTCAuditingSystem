@extends('layouts.layout')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-6">
            @foreach ($Schedules as $Schedule)
            <div class="box box-success box-solid ">

                <div class="box-header with-border">
                    <h3 class="box-title" style="padding-top: 5px;font-family: 微軟正黑體;">{{$Schedule->belongsToProject->Year}} 年度內部稽核通知單</h3>
                    <div class="pull-right">
                        @if ($Schedule->Issend ==1)
                          <button s_id="{{$Schedule->id}}" class="btn btn-primary Assigned" type="button" name="button">指派</button>
                        @endif
                    </div>
                </div>
                <div class="box-body">
                    {!!html_entity_decode($Schedule->Category)!!}
                    {!!html_entity_decode($Schedule->Focus)!!}
                    預計開始時程: {{$Schedule->Start_date }}<br>
                    預計結束時程: {{$Schedule->End_date }}<br>
                    @if ($Schedule->Issend !=1)
                      承辦人員:{{$Schedule->belongsToUser->Name}}
                    @endif
                </div>
                <div class="" style="padding:5px;">
                    <form id="{{$Schedule->id}}" action="{{url('notice/Assigned')}}/{{$Schedule->id}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$Schedule->id}}">
                        @if ($Schedule->Issend ==1)
                          <select class="form-control" name="u_id">
                            @foreach ($users as $user)
                              <option value="{{$user->id}}">{{$user->Name}}</option>
                            @endforeach
                          </select>
                        @endif
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-6">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title" style=" font-family: 微軟正黑體;">稽核行程提醒</h3>
                </div>
                <div class="box-body">
                    107 年度內部稽核計畫<br/>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(".Assigned").click(function() {
        var id = $(this).attr("s_id");
        console.log(id);
        $("form[id=" + id + "]").submit();
    });
</script>
@endsection
