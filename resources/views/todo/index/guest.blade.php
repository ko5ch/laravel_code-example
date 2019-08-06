@extends('todo.layouts.master')
@section('content')
    <div class="jumbotron">
        <div class="container text-justify">
            <h1>Hello There!</h1>
            <p>This is simple, another one, <strong><i><a class="todo_link" href="{{ route('tasks.index') }}">&laquo;todo&raquo;
                        </a> application </i></strong>created <strong>for controller-model code example.</strong></p>
            <p><b>Login:</b> <mark>user@site.com</mark></p>
            <p><b>Password:</b> <mark>password</mark></p>
        </div>
    </div>
@endsection