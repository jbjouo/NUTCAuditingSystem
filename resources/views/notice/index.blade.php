@extends('layouts.layout')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-6">
            @foreach ($Schedules as $Schedule)
            <div class="box box-primary box-solid">

                <div class="box-header with-border">
                    <h3 class="box-title" style="padding-top: 5px;font-family: 微軟正黑體;">{{$Schedule->belongsToProject->Year}} 年度內部稽核通知單</h3>
                    <div class="pull-right">
                        <button class="btn btn-success" type="button" name="button">指派</button>
                    </div>
                </div>
                <div class="box-body">
                    {!!html_entity_decode($Schedule->Category)!!}
                    {!!html_entity_decode($Schedule->Focus)!!}
                    預計開始時程: {{$Schedule->Start_date }}<br>
                    預計結束時程: {{$Schedule->End_date }}
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
@endsection
