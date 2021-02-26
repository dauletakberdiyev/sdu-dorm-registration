<?php

namespace App\Http\Controllers\Helpers\DB;

use Illuminate\Support\Facades\DB;

class MySqlProcedure implements MySqlInterface
{
    private $name = '';

    function __construct($name)
    {
        $this->name = $name;
    }

    public function input($input = null)
    {
        $this->input = $input;
    }

    public function output($output = null)
    {
        $this->output = $output;
    }

    public function params()
    {
        // TODO: Implement params() method.
    }

    public function execute()
    {
        $statement = 'call '.$this->name.'(';
        return 'call '.$this->name.'()';
    }
}
