@extends('todo.layouts.master')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading"></div>

            <div class="panel-body">
                {{ Form::model($task, ['method' => 'POST', 'route' => ['tasks.store']]) }}
                @include('todo.tasks.content.partials._form')

                @include('todo.partials.buttons._create')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection