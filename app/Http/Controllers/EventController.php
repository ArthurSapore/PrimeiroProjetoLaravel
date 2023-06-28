<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;

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
         * pega o campo de busca com o name search da view
         */
        $search = request('search');
        /**
         * verifica se o campo está preenchido
         */
        if($search){
            /**
             * like -> digo que quero registros parecidos com a query passada
             */
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        }else{
            /**
             * chama todos os eventos do banco de dados
             */
            $events = Event::all();
        }

        return view('welcome', ['events'=> $events, 'search'=>$search]);
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
       $event->date = $request ->date;
       $event->description = $request->description;
       $event->city = $request->city;
       $event->private = $request->private;
       $event->items = $request->items;

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
        * Chama o metódo auth para retornar os dados do usuário que está autenticado
        */
       $user = auth()->User();
       /**
        * passa o id do usuário autenticado para a variavel correspondende ao user_id na tabela events
        */
       $event->user_id = $user->id;
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
        /**
         * Diferente do find(like), o where irá procurar pelo valor exato
         * first() específica para retornar o primeiro registro encontrado.
         */
        $eventOwner = User::where('id', $event->user_id)->first();
        return view('events.show', ['event' => $event, 'eventOwner'=>$eventOwner->name]);
        
    }

    public function dashboard(){
        $user = auth()->user();
        /**
         * retorna os eventos relacionados àqueles usuários através do relacionamento ja criado no model.
         */
        $events =  $user->events;
        return view('events.dashboard', ['events'=> $events]);
    }
}
