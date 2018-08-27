<?php

namespace MihaiBlebea\FormBuilder\FormElements;

use MihaiBlebea\FormBuilder\FormElements\{
    InputElement,
    TextareaElement,
    SelectElement,
    CheckboxElement,
    RadioElement
};


class ElementFactory
{
    public static function create(String $class, Array $attr)
    {
        switch($class)
        {
            case $class === 'input':
                return new InputElement($attr);
            case $class === 'textarea':
                return new TextareaElement($attr);
            case $class === 'select':
                return new SelectElement($attr);
            case $class === 'checkbox':
                return new CheckboxElement($attr);
            case $class === 'radio':
                return new RadioElement($attr);
            case $class === 'custom':
                return new CustomElement($attr);
            case $class === 'button':
                return new ButtonElement($attr);
            default:
                return new InputElement($attr);
        }
    }
}
