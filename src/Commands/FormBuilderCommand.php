<?php

namespace MihaiBlebea\FormBuilder\Commands;

use Illuminate\Console\Command;

class FormBuilderCommand extends Command
{
    protected $signature = 'make:form {name}';

    protected $description = 'Generate a new Form class';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $template =
"<?php

namespace App\Http\Forms;

use MihaiBlebea\FormBuilder\FormBuilder;


class " . $this->argument('name') . "
{
    public static function build(FormBuilder \$form)
    {
        return \$form->input([
            'label'       => 'Insert your name:',
            'name'        => 'name',
            'type'        => 'text',
            'placeholder' => 'Please put your name'
        ])->button([
            'label' => 'Save'
        ]);
    }
}";

        $written = \File::put('app/Http/Forms/' . $this->argument('name') . '.php', $template);

        if($written)
        {
            $this->info('Created new Repo ' . $this->argument('name') . '.php in App\Http\Forms.');
        } else {
            $this->info('Something went wrong');
        }
    }
}
