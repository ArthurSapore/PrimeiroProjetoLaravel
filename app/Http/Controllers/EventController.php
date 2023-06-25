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
        * TRATANDO O RECEBIMENTO DE IMAGENS
        */
       if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;

            $extension = $requestImage->extension();
            /**
             * md5 cria um hash
             * PEGA O NOME DO ARQUIVO E CONCATEMA COM O HORÁRIO DO ENVIO 
             * PARA QUE O ARQUIVO TENHA UM NOME ÚNICO
             */
            $imageName = md5($requestImage->getClientOriginalName().strtotime("now").".".$extension);

        
            /**
             * SALVA A IMAGEM NO CAMINHO EXPECIFICADO COM O NOME CRIADO
             */
            $requestImage->move(public_path('img/events'), $imageName);

            /**
             * SALVA O NOME DA IMAGEM NO BANCO
             */

             
            $event->image = $imageName;
       }
       /**
        * método que irá persistir os dados no banco 
        */
       $event->save();
    /**
     * with envia uma mensagem de sessão para a view
     */
    return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    /**
     * funnção para buscar e mostrar os dados do banco
     */
    
    public function show ($id){
        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);
        
    }
}
