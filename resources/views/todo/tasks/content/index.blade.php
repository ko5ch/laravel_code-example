<table class="table">
    <thead>
    <tr>
        <th class="col-md-1 text-center">Status</th>
        <th class="col-md-3">Name</th>
        <th class="col-md-7">Description</th>
        <th class="col-md-1"></th>
    </tr>
    </thead>

    <tbody id="content">
    @foreach ($tasks as $task)
        @include ('todo.tasks.content.partials._item', ['task' => $task])
    @endforeach
    </tbody>
</table>
<div id="loading" style="display:none;">
    <img src="{{ asset('img/loading.gif') }}" alt="loading"  class="center-block"/>
</div>
<div id="pagination" class="col-md-12">
    {{ $tasks->links() }}
</div>