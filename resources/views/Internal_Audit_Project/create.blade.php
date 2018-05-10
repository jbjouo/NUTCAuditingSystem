@extends('layout.layout')
@section('content')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box  box-info">
                {{--標題--}}
                <div class="box-header with-border">
                    <h3 style="font-family:'Microsoft JhengHei'" class="box-title">新增年度計畫</h3>
                </div>

                <div class="box-body">
                    <form action="{{url('/NUTCAuditing/project/create')}}" method="post">
                        @csrf
                        {{--選擇年度 (下拉式選單)--}}
                        <div class="form-group">
                            <label>年度</label>
                            <select name="Year" class="form-control">
                                @for($i = 0; $i < 10; $i++)
                                <option value="{{now()->year-1911+$i}}">{{now()->year-1911+$i}}</option>
                                @endfor
                            </select>
                        </div>
                        {{--輸入稽核目標--}}
                        <div class="form-group">
                            <label>稽核目標</label>
                            <textarea  class = "ckeditor" id="test" name="Audit_scope" placeholder="" ></textarea>
                        </div>
                        {{--輸入稽核重點--}}
                        <div class="form-group">
                            <label>稽核重點</label>
                            <textarea class = "ckeditor" id="test1" name="Audit_focus" ></textarea>
                        </div>
                        {{--稽核類別選單--}}
                        <div class="form-group">
                            <label>稽核類別</label>
                            <select name="Audit_class" class="form-control">
                                <option value="AN">年度</option>
                                <option value="PR">專案</option>
                                <option value="IN">盤點</option>
                                <option value="OT">其他</option>
                            </select>
                        </div>
                        {{--提交--}}
                        <div class="box-footer">
                            {{--@Html.ValidationSummary()--}}
                            <input type="submit" class="btn btn-primary pull-right" value="送出" />
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    CKEDITOR.replace('test');
    CKEDITOR.replace('test1');
</script>
@stop

