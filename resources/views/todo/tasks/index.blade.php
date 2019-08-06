@extends('todo.layouts.master')

@section('content')
    <div class="panel custom-panel">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6 col-xs-6">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        @widget('modules.main.widgets.TasksFilter')
                    </div>
                </div>
                <div class="col-md-6 col-xs-6 float-right">
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary pull-right">
                        Create task
                    </a>
                </div>
            </div>
        </div>
        <div id="tasks_content">
            @include('todo.tasks.content.index')
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/ajax_pagination_filter.js') }}" ></script>
@endpush