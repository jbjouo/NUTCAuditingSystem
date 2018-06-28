<!DOCTYPE html>
<html>
<head>
  <meta charset='utf8'/>
  <style>
  h2{text-align:center;}
  h5{text-align:right;}
  table{text-align:center;}
  @media print {
  .new-page {
    page-break-before: always;
  }
}
  </style>
</head>
<body id = "body">
<br>
<br>
<h2>國立台中科技大學</h2>
<h2>年度內部稽核計畫表</h2>
<table border="1" cellspacing="3" cellpadding="4" id="a">
  <tr>
    <th>受查單位</th>
    <th width="10%">稽核項次</th>
    <th >稽核項目</th>
    <th width="22%">稽核重點</th>
    <th width="15%">預定稽核時程</th>
    <th>稽核人員</th>
    <th width="10%">稽核單位</th>
  </tr>
  @foreach ($data as $schedule)
  <tr>
      <td >{{$schedule->hasOneOffice->name}}</td>
      <td width="10%">{{$schedule->O_id}}-{{$schedule->Item_project}}</td>
      <td>{!!html_entity_decode($schedule->Category)!!}</td>
      <td width="22%">{!!html_entity_decode($schedule->Focus)!!}</td>
      <td width="15%">{{$schedule->Start_date }}~{{$schedule->End_date}}</td>
      <td>{{$schedule->belongsToAudit_user->name}}</td>
      <td width="10%">稽核室</td>
  </tr>
  @endforeach


</table >
</body>
</html>
