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


class CustomElement extends FormElement implements
    ConstructInterface,
    NameInterface,
    TypeInterface,
    ValueInterface,
    PlaceholderInterface,
    LabelInterface
{
    public $element = 'custom';

    protected $label;

    protected $type;

    protected $name;

    protected $value;

    protected $placeholder;

    protected $template;

    public function __construct(Array $attr)
    {
        if(isset($attr['template']) === false)
        {
            ErrorHandler::attributeMissing('template');
        }
        $this->template    = $attr['template'];
        $this->label       = $attr['label'];
        $this->type        = $attr['type'];
        $this->name        = $attr['name'];
        $this->value       = $attr['value'] ?? null;
        $this->placeholder = $attr['placeholder'] ?? null;
    }

    public function getTemplate()
    {
        return $this->template;
    }
}
