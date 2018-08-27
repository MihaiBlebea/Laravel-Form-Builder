<?php

namespace MihaiBlebea\FormBuilder;

use Exception;


class ErrorHandler
{
    public static function attributeMissing(String $name)
    {
        throw new Exception('You are missing the required attribute "' . $name . '"');
    }

    public static function isNotArray()
    {
        throw new Exception('This should be an array');
    }

    public static function doesNotHaveAttribute()
    {
        throw new Exception('Child does not have this attribute');
    }

    public static function methodIsNotValid(String $name)
    {
        throw new Exception('This method ' . $name . ' is not a valid one');
    }
}
