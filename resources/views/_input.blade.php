<div class="form-group">
    <label>{{ $el->getLabel() }}</label>
    <input type="{{ $el->getType() }}"
           class="form-control {{ $errors->has($el->getName()) ? 'is-invalid' : '' }}"
           name="{{ $el->getName() }}"
           value="{{ old($el->getName()) ?? $el->getValue() }}"
           placeholder="{{ $el->getPlaceholder() }}">

    @include('vendor.form-builder._error')
</div>
