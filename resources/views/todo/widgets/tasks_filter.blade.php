<form id="tasks-filters">
    <div class="form-group">
            {{ Form::select('category', $categories, null, [
                'id' => 'filterCategory',
                'class' => 'form-control',
                'data-url' => route('tasks.index')
            ]) }}
        </div>
</form>