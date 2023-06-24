<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

/**
 * As Views são chamadas no controller
 */

class EventController extends Controller
{
    public function  index () {
        /**
         * chama todos os eventos do banco de dados
         */
        $events = Event::all();
        return view('welcome', ['events'=> $events]);
    }

    public function create (){
        return view('events.create');
    }
}
