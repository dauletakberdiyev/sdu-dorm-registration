<?php

namespace App\Http\Controllers\Helpers\DB;

interface MySqlInterface{
    public function input();
    public function output();
    public function params();
    public function execute();
}
