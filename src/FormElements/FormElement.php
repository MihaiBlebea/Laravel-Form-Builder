<?php

namespace MihaiBlebea\FormBuilder\FormElements;

use MihaiBlebea\FormBuilder\ErrorHandler;


abstract class FormElement
{
    public function getType()
    {
        return $this->type;
    }

    public function setType(String $value)
    {
        $this->type = $value;
        return $this;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel(String $value)
    {
        $this->label = $value;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(String $value)
    {
        $this->name = $value;
        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function getPlaceholder()
    {
        return $this->placeholder;
    }

    public function setPlaceholder(String $value)
    {
        $this->placeholder = $value;
        return $this;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function addValue($value)
    {
        $this->value = $value;
    }
}
