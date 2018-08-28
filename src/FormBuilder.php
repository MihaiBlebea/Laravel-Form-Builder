<?php

namespace MihaiBlebea\FormBuilder;

use MihaiBlebea\FormBuilder\ErrorHandler;
use MihaiBlebea\FormBuilder\FormElements\ElementFactory;

class FormBuilder
{
    public $elements;

    public $action;

    public $method;

    public $buttons;

    public $validation;

    public function __construct(Array $form)
    {
        $this->checkRequired(['action'], $form);
        $this->action = $form['action'];
        $this->method = $form['method'] ?? 'POST';

        $this->elements = collect([]);
        $this->buttons = collect([]);

        $this->validation = collect([
            'input'    => ['type', 'name'],
            'textarea' => ['name'],
            'select'   => ['name'],
            'checkbox' => ['name'],
            'radio'    => ['name'],
            'custom'   => ['name'],
        ]);
    }

    public function __call($name, $arguments)
    {
        $attr = $arguments[0];
        if($this->validation->has($name) === false)
        {
            ErrorHandler::methodIsNotValid($name);
        }
        $this->generateElement($name, $attr);
        return $this;
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

    public function getButtons()
    {
        return $this->buttons;
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

    public function changeButtonLabel(String $old, String $new)
    {
        foreach($this->getButtons() as $button)
        {
            if(strtolower($button->getLabel()) === strtolower($old))
            {
                $button->setLabel($new);
            }
        }
        return $this;
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

    private function generateLabel(Array $attr)
    {
        if(isset($attr['label']) === false)
        {
            $attr['label'] = ucfirst(str_replace('_', ' ', $attr['name'])) . ':';
        }
        return $attr;
    }

    public function generateElement(String $name, Array $attr)
    {
        $this->checkRequired($this->validation[$name], $attr);
        $attr = $this->generateLabel($attr);
        $this->elements[$attr['name']] = ElementFactory::create($name, $attr);
    }

    public function button(Array $attr)
    {
        $this->checkRequired(['label'], $attr);
        $this->buttons->push(ElementFactory::create('button', $attr));
        return $this;
    }

}
