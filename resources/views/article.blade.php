@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$article->title}}</h1>
        <h2>{{$article->full_text}}</h2>
        @if(Auth::check() && Auth:: user()->status)
            {!! Form::open(['method'=>'delete','route'=>['articles.destroy',$article->id]]) !!}
            {{Form::submit('Удалить')}}
            {!! Form::close() !!}
            {!! Form::open(['method'=>'get','route'=>['articles.edit',$article->id]]) !!}
            {!!Form::submit('Редактироать')!!}
            {!! Form::close() !!}
        @endif
    </div>
@stop