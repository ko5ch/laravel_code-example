<i class="far fa-check-circle" style="display: {{ $task->is_done ? 'block' : 'none' }}"></i>
<i class="fa fa-toggle-{{$task->is_done ? 'on' : 'off'}}"
   aria-hidden="true"
   onclick="toggleStatus(this, '{{ $task->uid }}', '{{ $task->is_done }}' )"
></i>