<!DOCTYPE html>
<html>
<head>
  <meta charset='utf8'/>
  <style>
  body{ margin:0px auto;}
  p{width: 10cm;margin: 0px auto;}
  h2{text-align:center;}
  img{float:right;}
  </style>
</head>
<body>
<img src="{{asset('/images/logo.gif')}}" width="130" >
<h2>國立台中科技大學</h1>
<h2>______年度內部稽核計畫</h2>
<p >壹、稽核範圍</p>
<p>{!!html_entity_decode($data[0]->Audit_scope)!!}</p>
<p >貳、稽核重點(目的)</p>
<p>{!!html_entity_decode($data[0]->Audit_focus)!!}</p>
<p >參、稽核項目及期程(詳見內部稽核計畫表)</p>
</body>
</html>
