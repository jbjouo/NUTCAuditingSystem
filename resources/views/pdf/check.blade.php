<!DOCTYPE html>
<html>
<head>
  <meta charset='utf8'/>
  <style>
  h2{text-align:center;}
  h5{text-align:right;}
  table{text-align:center;}
  </style>
</head>
<body>
<br>
<br>
<h2>國立台中科技大學</h2>
<h2>內部稽核查檢表</h2>
<table border="1" cellspacing="3" cellpadding="4">
  <tr>
    <th>稽核項次</th>
    <th>查核項目</th>
    <th>查核重點</th>
    <th>查核結果</th>
    <th>查核情形說明</th>
    <th>佐證資料</th>
  </tr>
  @foreach ($data as $checks)
  <tr>
      <td >{{$checks->belongsToSchedule ->O_id}}-{{$checks->belongsToSchedule->Item_project}}</td>
      <td >{!!html_entity_decode($checks->belongsToSchedule->O_id)!!}</td>
      <td >{!!html_entity_decode($checks->belongsToSchedule->Focus)!!}</td>
      <td >{{$checks->result}}</td>
      <td >{!!html_entity_decode($check->description)!!}</td>
      <td >{{$checks->supporting_information}}</td>
  </tr>
  @endforeach
</table>
</body>
</html>
