@extends('layout.layout')
@section('content')
<link rel="stylesheet" href="/css/Audit_Project_Browse.css">
<div class="hold-transition skin-blue sidebar-mini">
    <section class="content-header">
        <h2 style="font-family:'Microsoft JhengHei';text-align:center;">
            年度內部稽核計畫
        </h2>
    </section>
    <!-- Main content -->
    <section class="content">
        <div>
            <div>
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="btn-group" style="margin-bottom:10px;">
                            <a class = "btn btn-block btn-default" href='{{url('/NUTCAuditing/project/create')}}'>新增年度計畫</a>
                        </div>
                        <div class="btn-group" style="margin-bottom:10px;">
                            <a class = "btn btn-block btn-default" href='#'>黑暗大法術</a>
                        </div>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>學年</th>
                                <th>編號</th>
                                <th>內容</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($data!=null)
                                @foreach($data as $item)
                                    <tr>
                                        <td>
                                            {{$item->Year}}
                                        </td>
                                        <td>
                                            {{$item->Year.'-'.$item->Audit_class.'-'.$item->Count }}
                                        </td>
                                        <td>
                                            <a href="#">查看 </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@stop
