<tr>
    <td class="text-center col-md-1 status">
       @include('todo.tasks.content.partials._status', ['task' => $task])
    </td>
    <td class="text-justify col-md-3">{{ $task->title }}</td>
    <td class="text-justify col-md-7">{{ $task->description}}</td>
    <td class="action col-md-1">
        @include('todo.partials.buttons._edit_link', ['url' => route('tasks.edit', $task->uid)])
        @include('todo.partials._destroy', ['url' => route('tasks.destroy', $task->uid)])
    </td>
</tr>

@push('js')
    <script src="{{ asset('js/ajax_status_manager.js') }}" ></script>
@endpush