<?php

namespace MihaiBlebea\FormBuilder\Commands;

use Illuminate\Console\Command;

class FormBuilderCommand extends Command
{
    protected $signature = 'template:make {url} {name?}';


    protected $description = 'Template description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if($this->argument('name') == null)
        {
            $name = str_random(8);
        } else {
            $name = $this->argument('name');
        }

        if($this->confirm('Are you sure you want to create a short url for ' . $this->argument('url') . '?'))
        {
            // Do some logic in here //
        }
    }
}
