@extends('todo.layouts.master')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading"></div>

            <div class="panel-body">
                {{ Form::model($task, ['method' => 'PUT', 'route' => ['tasks.update',  $task->uid]]) }}
                @include('todo.tasks.content.partials._form')

                @include('todo.partials.buttons._save')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection