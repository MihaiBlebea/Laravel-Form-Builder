<div class="form-group">
    <label>{{ $el->getLabel() }}</label>
    <textarea class="form-control {{ $errors->has($el->getName()) ? 'is-invalid' : '' }}"
              name="{{ $el->getName() }}"
              rows="3"
              placeholder="{{ $el->getPlaceholder() }}">{{ old($el->getName()) ?? $el->getValue() }}</textarea>

    @include('vendor.form-builder._error')
</div>
