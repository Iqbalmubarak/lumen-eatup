<?php

namespace App\Http\Controllers;
use App\Models\User;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function index(){
        $a = User::all();
        return $a;
    }
    
}
