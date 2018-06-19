@extends('layouts.layout')
@section('content')

<h2>請重新驗證</h2>
<form class="" action="{{ url('sendAuthEmail') }}" method="post">
  @csrf
  <input type="hidden" name="Account" value="{{Auth::user()->Account}}">
  <input type="submit" class="btn bun-primary" value="重寄">
</form>
@endsection
