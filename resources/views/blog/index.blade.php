@extends('layouts.default')
@section('content')
<h1>Articles</h1>
@foreach ($articles as $article)
<? echo $article->content; ?>
@endforeach
@stop
