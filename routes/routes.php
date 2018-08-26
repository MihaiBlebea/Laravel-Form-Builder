<?php

Route::get('/template/{template}', [
    'uses' => '\MihaiBlebea\Template\Controllers\TemplateController@index',
    'as' => 'template.index',
]);
