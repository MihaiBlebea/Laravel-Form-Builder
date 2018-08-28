<?php

use MihaiBlebea\FormBuilder\FormBuilderServiceProvider;
use PHPUnit\Framework\TestCase as TestBase;


abstract class TestCase extends TestBase
{
    protected function getPackageProviders($app)
    {
        return FormBuilderServiceProvider::class;
    }

    public function setUp()
    {
        //
    }

}
