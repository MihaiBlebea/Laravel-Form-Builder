
<form action="{{ $action ?? $form->getAction() }}" method="{{ $form->getMethod() }}">

@csrf

@foreach($form->getElements() as $element)

    @if($element->element !== 'custom')
        @include('vendor.form-builder._' . $element->element, [
            'el' => $element
        ])
    @else
        @include($element->getTemplate(), [
            'el' => $element
        ])
    @endif

@endforeach

@include('vendor.form-builder._button', [
    'label' => isset($button_label) ? $button_label : $form->getButton()['label']
])

</form>
