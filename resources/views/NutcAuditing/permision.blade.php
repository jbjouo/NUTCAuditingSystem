@extends('layouts.layout')
@section('content')

  <div class="content">
    @foreach ($Role as $item)
      <button id="{{$item->Role}}" type="button" name="button"class="btn btn-primary permision" value="{{$item->Role}}">{{$item->Name}}</button>
    @endforeach
    <div class="abc">
      <div>
            <div>
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover ">
                            <thead>
                                <tr>
                                    <th  width="40%">項目</th>
                                    <th class="text-center" width="12%">新增</th>
                                    <th class="text-center" width="12%">修改</th>
                                    <th class="text-center" width="12%">取消</th>
                                    <th class="text-center" width="12%">查詢</th>
                                    <th class="text-center" width="12%">簽核</th>
                                </tr>
                            </thead>
                            <tbody id="permision_table">
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
    $('.permision').click(function() {
      var value = this.value;
      $.ajax({
        type : 'post',
        url : "{{url('permision')}}",
        data : {
          role:value,
        },
        dataType : 'json',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        success: function (data) {

          $('#permision_table').empty();
          $(".btn-success").toggleClass("btn-success",false);
          $('.permision').toggleClass("btn-primary",true);
          $("#"+value).toggleClass("btn-primary",false);
          $("#"+value).toggleClass("btn-success",true);




          var i;
          for(i=1;i<=data.permision.length;i++){
            var Append =data.permision[i-1].Append?"V":"";
            var Modify =data.permision[i-1].Modify?"V":"";
            var Cance =data.permision[i-1].Cance?"V":"";
            var Search =data.permision[i-1].Search?"V":"";
            var Approve =data.permision[i-1].Approve?"V":"";
            $("#permision_table").append('<tr><td class="text-left">'+
            data.permision[i-1].Name + '</td><td class="text-center">' +
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
