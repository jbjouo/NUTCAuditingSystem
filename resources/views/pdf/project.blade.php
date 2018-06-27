<!DOCTYPE html>
<html>
<head>
  <meta charset='utf8'/>
  <style>
  h2{text-align:center;}
  h5{text-align:right;}
  </style>
</head>
<body>
<br>
<br>
<h5>稽核編號:{{$data[0]->Year}}-{{$data[0]->Audit_class}}-{{$data[0]->NumberOfYear}}</h5>
<h2>國立台中科技大學</h2>
<h2>{{$data[0]->Year}}年度內部稽核計畫</h2>
<p >壹、稽核範圍</p>
<p>{!!html_entity_decode($data[0]->Audit_scope)!!}</p>
<p >貳、稽核重點(目的)</p>
<p>{!!html_entity_decode($data[0]->Audit_focus)!!}</p>
<p >參、稽核項目及期程(詳見內部稽核計畫表)</p>
</body>
</html>
