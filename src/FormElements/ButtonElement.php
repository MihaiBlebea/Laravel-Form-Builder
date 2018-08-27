<?php

namespace MihaiBlebea\FormBuilder\FormElements;

use MihaiBlebea\FormBuilder\Interfaces\{
    ConstructInterface,
    ButtonInterface
};
use MihaiBlebea\FormBuilder\FormElements\FormElement;


class ButtonElement extends FormElement implements
    ConstructInterface,
    ButtonInterface
{
    protected $label;

    protected $type;

    protected $class;

    public function __construct(Array $attr)
    {
        $this->label = $attr['label'];
        $this->type  = $attr['type'] ?? 'submit';
        $this->class = $attr['class'] ?? 'btn-primary';
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getClass()
    {
        return $this->class;
    }
}
