@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($articles as $article)
            <a href="{{url('articles/'.$article->id)}}"> {{$article->title}}</a> <br>
            {{$article->short_text}} <br>
        @endforeach
            @if(Auth::check() && Auth:: user()->status)
                <h1><a href="{{url('articles/create')}}"> Добавить статью</a> </h1><br>
            @endif
    </div>
@stop