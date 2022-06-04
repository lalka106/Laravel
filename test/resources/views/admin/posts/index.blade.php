@extends('layout.admin')

@section('page')
    Reviews
@endsection
@section('main-content')

    <h2>Обзоры</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Тема</th>
                <th>Описание</th>
                <th>Email</th>
                <th>Автор</th>
                <th></th>
                <th></th>

            </tr>
            </thead>
            <tbody>
            @foreach($reviews as $key=>$review)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$review->subject}}</td>
                    <td>{{$review->message}}</td>
                    <td>{{$review->email}}</td>
                    <td>{{$review->user_id}}</td>
                    <a href="{{route('admin.posts.edit',$review->id)}}">
                        <td><button class="btn btn-warning">Update</button></td>
                    </a>
                    <td><form action="{{route('admin.posts.destroy',$review->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
