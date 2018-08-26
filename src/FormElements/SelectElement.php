<?php

namespace MihaiBlebea\FormBuilder\FormElements;

use MihaiBlebea\FormBuilder\Interfaces\{
    ConstructInterface,
    NameInterface,
    TypeInterface,
    ValueInterface,
    LabelInterface
};
use MihaiBlebea\FormBuilder\FormElements\FormElement;


class SelectElement extends FormElement implements
    ConstructInterface,
    NameInterface,
    TypeInterface,
    ValueInterface,
    LabelInterface
{
    public $element = 'select';

    protected $label;

    protected $type;

    protected $name;

    protected $value;

    protected $placeholder;

    protected $options;

    private $multiple;

    public function __construct(Array $attr)
    {
        $this->label       = $attr['label'];
        $this->name        = $attr['name'];
        $this->value       = $attr['value'] ?? null;
        $this->placeholder = $attr['placeholder'] ?? null;
        $this->multiple    = $attr['multiple'] ?? false;
        $this->options     = $attr['options'] ?? null;
    }

    public function isMultiple()
    {
        return $this->multiple;
    }
}
