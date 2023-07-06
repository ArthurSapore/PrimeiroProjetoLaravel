@extends('layouts.main')            
@section('title', 'Meus eventos')    
       
@section('content')     
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus Eventos</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if(count($events) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td scropt="row">{{ $loop->index + 1 }}</td>
                        <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                        <td>{{count($event->users)}}</td>
                        <td class="action-btn">
                            <a href="/events/edit/{{$event->id}}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                            
                            <form action="/events/{{$event->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" href=""><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                            </form>
                        </td>
                            
                    </tr>
                @endforeach    
            </tbody>
        </table>
        @else
        <p>Você ainda não tem eventos, <a href="/events/create">criar evento</a></p>
        @endif
        <h1>Eventos que estou participando</h1>
        @if(count($eventsAsParticipant) > 0)    
           

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($eventsAsParticipant as $eventParticipant)
                        <tr>
                            <td scropt="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/events/{{ $event->id }}">{{ $eventParticipant->title }}</a></td>
                            <td>{{count($eventParticipant->users)}}</td>
                            <td class="action-btn">
                                <form action="/events/disjoinEvent/{{$event->id}}" method="post">
                                    @csrf
                                    <button class="btn btn-danger"><ion-icon name="create-outline"></ion-icon>Sair do evento</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach    
                </tbody>
            </table>
        @else
            <p>Você não está cadastrado em nenhum evento. <a href="/">Ver todos os eventos.</a></p>

        @endif   

    </div>

@endsection