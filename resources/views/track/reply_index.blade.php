@extends('layouts.layout')
@section('content')
  <section class="content-header">
    <center>
      <h2 style="font-family:'Microsoft JhengHei';">
        稽核列管事項回復
      </h2>
    </center>
  </section>
  <section class="content">
              <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table id="example2" class="table table-bordered table-hover">
                          <thead>
                            <th class="text-center" width="20%">回覆期限</th>
                            <th class="text-center" width="60%">內部稽核結論與建議事項</th>
                            <th class="text-center" width="20%">回復</th>
                          </thead>
                          <tbody>
                            @foreach ($tracks as $track)
                              <tr>
                                <td class="text-center">{{$track->deadline}}</td>
                                <td class="text-center">{!!html_entity_decode($track->belongsToCheck->description)!!}</td>
                                <td class="text-center">
                                  @if ($track->reply_time!=null)
                                    @if ($track->result!=null)
                                      {{$track->result}}
                                    @else
                                      審核中
                                    @endif
                                  @else
                                    <a href="{{url('track/reply')}}/{{$track->id}}"><button class="btn btn-primary"type="button" name="button">回復</button></a>
                                  @endif

                                </td>
                              </tr>
                            @endforeach

                          </tbody>
                        </table>
                    </div>
                </div>
    </section>

@endsection
