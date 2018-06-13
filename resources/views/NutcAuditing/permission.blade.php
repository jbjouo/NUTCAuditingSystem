@extends('layouts.layout')
@section('content')

  <div class="content">
    @foreach ($Role as $item)
      <button id="{{$item->Role}}" type="button" name="button"class="btn btn-primary permission" value="{{$item->Role}}">{{$item->Name}}</button>
    @endforeach
    <hr>
    <div class="abc">
      <div>
            <div>
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover ">
                            <thead>
                                <tr>
                                    <th class="text-center" width="40%">項目</th>
                                    <th class="text-center" width="12%">新增</th>
                                    <th class="text-center" width="12%">修改</th>
                                    <th class="text-center" width="12%">取消</th>
                                    <th class="text-center" width="12%">查詢</th>
                                    <th class="text-center" width="12%">簽核</th>
                                </tr>
                            </thead>
                            <tbody id="permission_table">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <meta name="_token" content="{{ csrf_token() }}"/>
  <script type="text/javascript">
    $('.permission').click(function() {
      var value = this.value;
      $.ajax({
        type : 'post',
        url : "{{url('permission')}}",
        data : {
          role:value,
        },
        dataType : 'json',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {

          $('#permission_table').empty();

          $(".btn-success").toggleClass("btn-success",false);
          $('.permission').toggleClass("btn-primary",true);
          $("#"+value).toggleClass("btn-primary",false);
          $("#"+value).toggleClass("btn-success",true);




          var i;
          for(i=1;i<=data.permission.length;i++){
            var Append =data.permission[i-1].Append?"V":"";
            var Modify =data.permission[i-1].Modify?"V":"";
            var Cance =data.permission[i-1].Cance?"V":"";
            var Search =data.permission[i-1].Search?"V":"";
            var Approve =data.permission[i-1].Approve?"V":"";
            $("#permission_table").append('<tr><td class="text-left">'+
            data.permission[i-1].Name + '</td><td class="text-center">' +
            Append + '</td><td class="text-center">' +
            Modify + '</td><td class="text-center">' +
            Cance + '</td><td class="text-center">' +
            Search + '</td><td class="text-center">' +
            Approve +
            "</td></tr>");
          }
        },
        error: function(xhr, type){
          alert('出錯惹！');
        }
      });
    });
  </script>
@stop
