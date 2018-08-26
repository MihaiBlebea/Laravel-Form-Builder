<?php

namespace MihaiBlebea\FormBuilder\FormElements;

use MihaiBlebea\FormBuilder\Interfaces\{
    ConstructInterface,
    NameInterface,
    ValueInterface,
    PlaceholderInterface,
    LabelInterface
};
use MihaiBlebea\FormBuilder\FormElements\FormElement;


class TextareaElement extends FormElement implements
    ConstructInterface,
    NameInterface,
    ValueInterface,
    PlaceholderInterface,
    LabelInterface
{
    public $element = 'textarea';

    protected $label;

    protected $name;

    protected $value;

    protected $placeholder;

    public function __construct(Array $attr)
    {
        $this->label       = $attr['label'];
        $this->rows        = $attr['rows'] ?? 3;
        $this->name        = $attr['name'];
        $this->value       = $attr['value'] ?? null;
        $this->placeholder = $attr['placeholder'] ?? null;
    }
}
