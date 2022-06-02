@extends('layout')

@section('page')
    {{$reviews->subject}}
@endsection

@section('main-content')

    @include('include.messages')
    <br>
    <h1> {{$reviews->subject}} </h1>
    <div class="alert alert-info">
        {{--            <h3>{{$reviews->subject}}</h3>--}}
        <b>Автор - {{$reviews->email}}</b>
        <p>Содержимое - {{$reviews->message}}</p>
        <p>Дата создания - <small>{{$reviews->created_at}}</small></p>
        <div>
            <a href="{{route('review-update',$reviews->id)}}">
                <button class="btn btn-primary">Редактировать</button>
            </a>
            <a href="{{route('review-delete',$reviews->id)}}">
                <button class="btn btn-warning">Удалить</button>
            </a>
        </div>
    </div>
@endsection
