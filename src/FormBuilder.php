<?php

namespace MihaiBlebea\FormBuilder;

use MihaiBlebea\FormBuilder\ErrorHandler;
use MihaiBlebea\FormBuilder\FormElements\ElementFactory;

class FormBuilder
{
    public $elements;

    public $action;

    public $method;

    public $button = 'Submit';

    public function __construct(Array $form)
    {
        $this->checkRequired(['action', 'method'], $form);
        $this->action = $form['action'];
        $this->method = $form['method'];

        $this->elements = collect([]);
    }

    public function getElements()
    {
        return $this->elements;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getButton()
    {
        return $this->button;
    }

    public function addValues(Array $values)
    {
        foreach($values as $key => $value)
        {
            if(array_key_exists($key, $this->elements->toArray()))
            {
                $this->elements[$key]->addValue($value);
            }
        }
    }

    private function checkRequired(Array $labels, Array $attr)
    {
        foreach($labels as $label)
        {
            if(!isset($attr[$label]))
            {
                ErrorHandler::attributeMissing($label);
            }
        }
    }

    public function input(Array $attr)
    {
        $this->checkRequired(['label', 'type', 'name'], $attr);
        $this->elements[$attr['name']] = ElementFactory::create('input', $attr);
        return $this;
    }

    public function textarea(Array $attr)
    {
        $this->checkRequired(['label', 'name'], $attr);
        $this->elements[$attr['name']] = ElementFactory::create('textarea', $attr);
        return $this;
    }

    public function select(Array $attr)
    {
        $this->checkRequired(['label', 'name'], $attr);
        $this->elements[$attr['name']] = ElementFactory::create('select', $attr);
        return $this;
    }

    public function checkbox(Array $attr)
    {
        $this->checkRequired(['label', 'name'], $attr);
        $this->elements[$attr['name']] = ElementFactory::create('checkbox', $attr);
        return $this;
    }

    public function radio(Array $attr)
    {
        $this->checkRequired(['label', 'name'], $attr);
        $this->elements[$attr['name']] = ElementFactory::create('radio', $attr);
        return $this;
    }

    public function button(Array $attr)
    {
        $this->checkRequired(['label'], $attr);
        $this->button = $attr;
        return $this;
    }


}
