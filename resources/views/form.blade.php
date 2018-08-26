
<form action="{{ $action ?? $form->getAction() }}" method="{{ $form->getMethod() }}">

@csrf

@foreach($form->getElements() as $element)

    @include('vendor.form-builder._' . $element->element, [
        'el' => $element
    ])

@endforeach

@include('vendor.form-builder._button', [
    'label' => isset($button_label) ? $button_label : $form->getButton()['label']
])

</form>
