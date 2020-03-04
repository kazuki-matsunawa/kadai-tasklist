@extends('layouts.app')

@section('content')

    @if (Auth::check())
        {{ Auth::user()->name }}

        <h1>メッセージ一覧</h1>
    
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>メッセージ</th>
                        <th>ステータス</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                        <td>{{ $task->content }}</td>
                        <td>{{ $task->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Microposts</h1>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
    {!! link_to_route('tasks.create', '新規メッセージの投稿', [], ['class' => 'btn btn-primary']) !!}

@endsection