<?php

namespace App\Http\Controllers\Helpers\DB;

interface MySqlInterface{
    public function input($input);
    public function output($output);
    public function params();
    public function execute();
}
