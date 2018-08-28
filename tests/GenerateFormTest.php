<?php

use MihaiBlebea\FormBuilder\FormBuilder;


class TemplateTest extends TestCase
{
    public $action = '/index';

    public $method = 'GET';

    public $label = 'Got milk?';

    public $name = 'milk_shake';

    public $type = 'text';

    public $placeholder = 'Insert your name here';

    public function testHasActionMethod()
    {
        $form = new FormBuilder([
            'action' => $this->action,
            'method' => $this->method
        ]);
        $this->assertEquals($form->getAction(), $this->action);
        $this->assertEquals($form->getMethod(), $this->method);
    }

    public function testHasDefaultMethod()
    {
        $form = new FormBuilder([
            'action' => $this->action
        ]);
        $this->assertEquals($form->getMethod(), 'POST');
    }

    public function testHasDefaultLabel()
    {
        $name_one = 'milkshake';
        $name_two = 'pop_stick';

        $form = new FormBuilder([
            'action' => $this->action
        ]);

        $form->input([
            'label' => $this->label,
            'name'  => $name_one,
            'type' => $this->type
        ])->input([
            'name'  => $name_two,
            'type' => $this->type
        ]);

        $this->assertEquals($form->getElements()[$name_one]->getLabel(), $this->label);
        $this->assertEquals($form->getElements()[$name_two]->getLabel(), 'Pop stick:');
    }

    public function testHasInsertedValues()
    {
        $form = new FormBuilder([
            'action' => $this->action
        ]);

        $form->input([
            'label'       => $this->label,
            'name'        => $this->name,
            'type'        => $this->type,
            'placeholder' => $this->placeholder,
            'value'       => $this->value
        ]);

        $element = $form->getElements()[$this->name];
        $this->assertEquals($element->getLabel(), $this->label);
        $this->assertEquals($element->getName(), $this->name);
        $this->assertEquals($element->getType(), $this->type);
        $this->assertEquals($element->getPlaceholder(), $this->placeholder);
        $this->assertEquals($element->getValue(), $this->value);
    }

    public function testAddValuesLater()
    {
        $form = new FormBuilder([
            'action' => $this->action
        ]);

        $form->input([
            'label'       => $this->label,
            'name'        => $this->name,
            'type'        => $this->type,
            'placeholder' => $this->placeholder
        ]);

        $form->addValues([
            $this->name => $this->value
        ]);

        $element = $form->getElements()[$this->name];
        $this->assertEquals($element->getValue(), $this->value);
    }

    public function testHasButtons()
    {
        $form = new FormBuilder([
            'action' => $this->action
        ]);

        $form->button([
            'label'       => 'Press here',
            'class'       => 'btn-primary',
            'type'        => 'submit',
        ])->button([
            'label'       => 'Reset form',
            'class'       => 'btn-secondary',
            'type'        => 'reset',
        ]);

        $buttons = $form->getButtons();
        $this->assertEquals($buttons[0]->getLabel(), 'Press here');
        $this->assertEquals($buttons[1]->getLabel(), 'Reset form');

        $this->assertEquals($buttons[0]->getClass(), 'btn-primary');
        $this->assertEquals($buttons[1]->getClass(), 'btn-secondary');

        $this->assertEquals($buttons[0]->getType(), 'submit');
        $this->assertEquals($buttons[1]->getType(), 'reset');
    }
}
