<?php

namespace MihaiBlebea\FormBuilder\FormElements;

use MihaiBlebea\FormBuilder\Interfaces\{
    ConstructInterface,
    NameInterface,
    TypeInterface,
    ValueInterface,
    PlaceholderInterface,
    LabelInterface
};
use MihaiBlebea\FormBuilder\FormElements\FormElement;


class InputElement extends FormElement implements
    ConstructInterface,
    NameInterface,
    TypeInterface,
    ValueInterface,
    PlaceholderInterface,
    LabelInterface
{
    public $element = 'input';

    protected $label;

    protected $type;

    protected $name;

    protected $value;

    protected $placeholder;

    public function __construct(Array $attr)
    {
        $this->label       = $attr['label'];
        $this->type        = $attr['type'];
        $this->name        = $attr['name'];
        $this->value       = $attr['value'] ?? null;
        $this->placeholder = $attr['placeholder'] ?? null;
    }
}
