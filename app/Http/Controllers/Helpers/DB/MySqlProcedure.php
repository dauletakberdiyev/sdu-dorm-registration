<?php

namespace App\Http\Controllers\Helpers\DB;

class MySqlProcedure implements MySqlInterface
{
    private $name = '';

    function __construct($name)
    {
        $this->name = $name;
    }

    public function input()
    {
        // TODO: Implement input() method.
    }

    public function output()
    {
        // TODO: Implement output() method.
    }

    public function params()
    {
        // TODO: Implement params() method.
    }

    public function execute()
    {

    }
}
