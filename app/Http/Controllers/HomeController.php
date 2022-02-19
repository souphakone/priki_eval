<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index($nbDays = 5)
    {
        return view("home")->with (['filtervalue' => $nbDays]);
    }
}
