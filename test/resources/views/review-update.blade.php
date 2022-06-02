@extends('layout')

@section('page')
    Review
@endsection

@section('main-content')
    <h1>Редактирование отзыва</h1>

    @include('include.messages')

    <form method="post" action="{{route('review-update-submit',$reviews->id)}}">
        @csrf
        <input type="email" name="email" value="{{$reviews->email}}" id="email" placeholder="Введите email" class="form-control"><br>
        <input type="text" name="subject" value="{{$reviews->subject}}" id="subject" placeholder="Введите отзыв" class="form-control"><br>
        <textarea name="message" id="message"  cols="30" rows="10" class="form-control"
                  placeholder="Введите текст">{{$reviews->message}}</textarea><br>
        <button type="submit" class="btn btn-success">Редактировать</button>
    </form>
@endsection
