<!DOCTYPE html>
<html lang="en">
@include('todo.layouts.partials._head')
<body>

@include('todo.layouts.partials._navigation')
<div id="app">
    @yield('content')
</div>

@include('todo.layouts.partials._footer')
@include('todo.layouts.partials._scripts')
@include('todo.layouts.partials._alerts')
</body>
</html>
