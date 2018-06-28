@extends('layouts.layout')
@section('content')
<section class="content">
    <div class="row">
        <!-- left column -->
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
            <!-- /.box -->
            <!-- general form elements disabled -->
            <div class="box  box-info">
                <div class="box-header with-border">
                    <h3 style="font-family:'Microsoft JhengHei'" class="box-title">新增報表</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form" method="post" action="{{url('pdf/create')}}">
                        <!-- text input -->
                        @csrf
                        <!-- textarea -->
                        <div class="form-group">
                            <select class="project form-control" name="id">
                              @foreach ($projects as $project)
                              @if (DB::table('projects')->find($project->id)->Status=="公告中")
                                <option selected="selected" value="{{$project->id}}">{{$project->Year}}-AN-{{$project->NumberOfYear}}  {{$project->Status}}</option>
                                @endif
                              @endforeach
                            </select>
                            <br>
                            <input type="submit" class="btn btn-primary pull-left" value="送出" />
                        </div>
                        <!-- Select multiple-->
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>
@endsection
