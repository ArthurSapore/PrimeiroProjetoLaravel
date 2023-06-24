<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

/**
 * As Views são chamadas no controller
 */

class EventController extends Controller
{
    /**
     * renderiza a tela inicial
     */
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
    /**
     * Request são os valores que irão ser recebidos para serem armazenados
     */

    public function store(Request $request){
        /**
         * instâncio o model em uma variavel
         * e informo onde cada valor recebido será armazenado no model
         */
       $event = new Event;

       $event->title = $request->title;
       $event->description = $request->description;
       $event->city = $request->city;
       $event->private = $request->private;

       /**
        * método que irá persistir os dados 
        */
       $event->save();

    return redirect('/');

        
    }
}
