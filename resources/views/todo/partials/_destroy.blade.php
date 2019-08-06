@if (isset($url) && is_string($url))
    @php ($btnClass = $btnClass ?? 'btn btn-danger btn-sm btn-primary-spacing')
    @php ($btnText = $btnText ?? "<i class=\"fa fa-trash\"></i>")

    {{ Form::open(['url' => $url, 'method' => $method ?? 'DELETE', 'class' => 'form-confirm form-inline']) }}
        <button class="{{ $btnClass }}" type="submit" title="{{ isset($title) && is_string($title) ? $title : 'Delete' }}">
            {!! $btnText !!}
        </button>
    {{ Form::close() }}
@endif