
@extends('layouts.main')
@section('title', 'Laravel')
@section('content')
    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        <h2>Próximos Eventos</h2>
        @if($search)
            <p class="subtitle">Buscando por: {{$search}}</p>
        @else
            <p class="subtitle">Veja os eventos dos próximos dias</p>
        @endif
        <div id="cards-container" class="row">
            @if(count($events)==0)
                @if($search)
                    <p>Não há eventos cadastrados para {{$search}}. <a href="/">Ver todos </a></p>
                    
                @else
                    <p>Não há eventos cadastrados.</p>
                @endif
            @endif
            @foreach($events as $event)
            <div class="card col-md-3">
                <img src="/img/events/{{$event->image}}" alt="">
                <div class="card-body">
                    <p class="card-date">{{date('d/m/Y', strtotime($event->date))}}</p>
                    <p class="card-participants">{{count($event->users)}} Participantes</p>
                    <h5 class="card-title">{{$event-> title}}</h5>
                    <p class="card-description">{{$event->description}}</p>
                    <a href="/events/{{$event->id}}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
            @endforeach
        </div>
</div>
@endsection