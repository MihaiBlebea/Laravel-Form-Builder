<?php

namespace MihaiBlebea\FormBuilder\FormElements;

use MihaiBlebea\FormBuilder\Interfaces\{
    ConstructInterface,
    NameInterface,
    TypeInterface,
    ValueInterface,
    LabelInterface
};
use MihaiBlebea\FormBuilder\ErrorHandler;
use MihaiBlebea\FormBuilder\FormElements\FormElement;


class CheckboxElement extends FormElement implements
    ConstructInterface,
    NameInterface,
    TypeInterface,
    ValueInterface,
    LabelInterface
{
    public $element = 'checkbox';

    protected $label;

    protected $type;

    protected $name;

    protected $value;

    protected $options;

    private $inline;

    public function __construct(Array $attr)
    {
        if($attr['value'] && is_array($attr['value']) === false)
        {
            ErrorHandler::isNotArray();
        }
        $this->label       = $attr['label'];
        $this->name        = $attr['name'];
        $this->value       = $attr['value'] ?? null;
        $this->options     = $attr['options'] ?? null;
        $this->inline      = $attr['inline'] ?? false;
    }

    public function isInline()
    {
        return $this->inline;
    }
}
