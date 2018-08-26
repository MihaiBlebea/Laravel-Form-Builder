<div class="form-group">
    @foreach($el->getOptions() as $label => $value)

        <div class="form-check {{ $el->isInline() ? 'form-check-inline' : '' }}">
            <input class="form-check-input"
                   style="cursor:pointer;"
                   name="{{ $el->getName() }}[]"
                   type="checkbox"
                   value="{{ $value }}">
            <label class="form-check-label">{{ $label }}</label>
        </div>

    @endforeach

    <div class="form-check-input {{ $errors->has($el->getName()) ? 'is-invalid' : '' }}"></div>
    @include('vendor.form-builder._error')
</div>
