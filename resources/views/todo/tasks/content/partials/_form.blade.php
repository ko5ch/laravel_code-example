@component('todo.partials._group', ['el' => 'title'])
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
@endcomponent

@component('todo.partials._group', ['el' => 'description'])
    {{ Form::label('description', 'Description') }}
    {{ Form::text('description', null, ['class' => 'form-control', 'id' => 'description']) }}
@endcomponent

@component('todo.partials._group', ['el' => 'category_id'])
    {{ Form::label('category_id', 'Category') }}
    {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'id' => 'category_id']) }}
@endcomponent