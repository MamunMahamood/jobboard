<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ajob;


class AjobController extends Controller
{
    public function save(){
        $user = User::find(1);
        $user->ajobs()->attach(1);
    }
}
