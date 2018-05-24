@extends('layouts.layout')
@section('content')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
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
                    <h3 style="font-family:'Microsoft JhengHei'" class="box-title">新增年度計畫</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form" method="post" action="{{url('project/create')}}">
                        <!-- text input -->
                        @csrf
                        <div class="form-group">
                            <label>年度</label>
                            <select name="Year" class="form-control">
                                @for($i = 0; $i < 10; $i++)
                                <option value="{{now()->year-1911+$i}}">{{now()->year-1911+$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <!-- textarea -->
                        <div class="form-group">
                            <label>目標</label>
                            <textarea class="ckeditor" id="test" name="Audit_scope" placeholder=""></textarea>
                        </div>
                        <div class="form-group">
                            <label>重點</label>
                            <textarea class="ckeditor" id="test1" name="Audit_focus"></textarea>
                        </div>
                        <div class="form-group">
                            <label>類別</label>
                            <select name="Audit_class" class="form-control">
                              <option value="AN">年度</option>
                              <option value="PR">專案</option>
                              <option value="IN">盤點</option>
                              <option value="OT">其他</option>
                            </select>

                        </div>

                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary pull-right" value="送出" />
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

<script type="text/javascript">
    CKEDITOR.replace('test');
    CKEDITOR.replace('test1');
</script>


@endsection
