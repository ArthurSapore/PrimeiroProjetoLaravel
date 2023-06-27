@extends('layout.main')            
@section('title', 'Meus eventos')    
       
@section('container')            
    @foreach($events as $event)
    <div class="card col-md-3">
        <img src="/img/events/{{$event->image}}" alt="">
        <div class="card-body">
            <p class="card-date">{{date('d/m/Y', strtotime($event->date))}}</p>
            <p class="card-participants">X Participantes</p>
            <h5 class="card-title">{{$event-> title}}</h5>
            <p class="card-description">{{$event->description}}</p>
            <a href="/events/{{$event->id}}" class="btn btn-primary">Saber mais</a>
        </div>
    </div>
    @endforeach
@endsection