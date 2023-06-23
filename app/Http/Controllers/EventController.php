<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * As Views são chamadas no controller
 */

class EventController extends Controller
{
    public function  index () {
        return view('welcome');
    }

    public function create (){
        return view('events.create');
    }
}
