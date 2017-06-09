@extends('layouts.default')
@section('content')
<div class="page-header">
  <h1>Blog</h1>
</div>
@foreach ($articles as $article)
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><? echo $article->title; ?></h3>
  </div>
  <div class="panel-body">
    <? echo $article->content; ?>
  </div>
</div>
@endforeach
@stop
