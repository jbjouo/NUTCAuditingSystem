@extends('layouts.layout')
@section('content')

<div class="content">
    <div class="text-center">
        <h3 style="font-family:'Microsoft JhengHei';">審核單位主管權限</h3>
    </div>
    <hr>
    <div class="abc">
        <div class="box">
            <div class="box-body">
                <div class="box-header">
                    <div class=" btn-group btn_bottom pull-right">
                        <button id="verification" class="btn btn-block btn-default">審核</button>
                    </div>
                </div>
                <table id="example2" class="table table-bordered table-hover ">
                    <thead>
                        <tr>
                            <th class="text-center" width="10%">全選 <input type="checkbox" name="all" onclick="check_all(this,'cb')"></th>
                            <th class="text-center" width="30%">姓名</th>
                            <th class="text-center" width="30%">單位</th>
                            <th class="text-center" width="30%">職務</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form class="verification" action="{{url('verification')}}" method="post">
                          @csrf
                            @foreach ($uesrs as $uesr)
                            <tr>
                                <td class="text-center"><input type="checkbox" name="cb[]" value="{{$uesr->id}}"></td>
                                <td class="text-center">{{$uesr->Name}}</td>
                                <td class="text-center">{{$uesr->hasOneInformation->hasOneOffice->name}}</td>
                                <td class="text-center">{{$uesr->hasOneInformation->position}}</td>
                            </tr>
                            @endforeach
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function check_all(obj, cName) {
        var checkboxs = $("input[name='cb[]']");
        for (var i = 0; i < checkboxs.length; i++) {
            checkboxs[i].checked = obj.checked;
        }
    }
    $('#verification').click(function() {
        $('form[class="verification"').submit();
    });
</script>
@stop
