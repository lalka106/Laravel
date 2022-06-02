@extends('layout')

@section('page')
    Review
@endsection

@section('main-content')
    <h1>Форма отзыва</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="/review/check">
        @csrf
        <input type="email" name="email" id="email" placeholder="Введите email" class="form-control"><br>
        <input type="text" name="subject" id="subject" placeholder="Введите отзыв" class="form-control"><br>
        <textarea name="message" id="message" cols="30" rows="10" class="form-control"
                  placeholder="Введите текст"></textarea><br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
    <br>
    <h1>Все отзывы</h1>
    @foreach($reviews as $review)
        <div class="alert alert-info">
            <h3>{{$review->subject}}</h3>
            <b>{{$review->email}}</b>
            <p>{{$review->message}}</p>
            <p>{{$review->created_at}}</p>
        </div>
    @endforeach
@endsection
