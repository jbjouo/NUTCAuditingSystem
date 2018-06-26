@extends('layouts.layout')
@section('content')
    <link rel="stylesheet" href="{{asset('/css/Auditing_Index.css')}}">
    <section class="content">
        <div class="row">
          <div class="col-md-6">
            @foreach ($projects as $project)
              <div class="box box-primary box-solid">
                  <div class="box-header with-border">
                      <h3 class="box-title" style=" font-family: 微軟正黑體;">{{$project->Year}} 年度內部稽核計畫</h3>
                  </div>
                  <div class="box-body">
                      稽核範圍:<br/>
                      {!!html_entity_decode($project->Audit_scope)!!}
                      稽核重點:<br/>
                      {!!html_entity_decode($project->Audit_focus)!!}
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
