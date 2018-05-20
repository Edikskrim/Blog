@extends('layouts.app')

@section('content')
    <div class="container">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error}}</li>
                    @endforeach

                </ul>
            </div>
        @endif
        {!! Form::open(['method'=>'post','route'=>'articles.store']) !!}
        <h1>{{Form::label('title',"Заголовок")}}</h1>
        {{Form::text('title')}}<br>
        <h1>{{Form::label('short_text',"Описание")}}</h1>
        {{Form::textarea('short_text')}}<br>
        <h1>{{Form::label('full_text',"Текст")}}</h1>
        {{Form::textarea('full_text')}}<br>
        {{Form::submit('Отправить')}}
        {!! Form::close() !!}
    </div>
@stop