@if (isset($el) && is_string($el))
    @if ($errors->has($el))
        <strong class="text-danger">
            {{ $errors->first($el) }}
        </strong>
    @endif
@endif