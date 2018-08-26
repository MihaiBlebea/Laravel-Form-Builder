<div class="form-group">
    <label>{{ $el->getLabel() }}</label>
    <select {{ $el->isMultiple() ? 'multiple' : '' }}
            class="form-control {{ $errors->has($el->getName()) ? 'is-invalid' : '' }}"
            name="{{ $el->getName() }}">
        @if($el->getPlaceholder() !== null)
            <option disabled {{ $errors->has($el->getName()) ? '' : 'selected' }}>{{ $el->getPlaceholder() }}</option>
        @endif

        @foreach($el->getOptions() as $label => $data)
            <option value="{{ $data }}" {{ ($el->getValue() === $data || old($el->getName()) === $data) ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>

    @include('vendor.form-builder._error')
</div>
