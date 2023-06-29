@extends('layouts.main')
@section('title', 'Editar evento: '.$edit->title)
@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Editando o evento: {{$edit->title}}</h1>
        <form action="/events/update/{{$edit->id}}" method="post" enctype="multipart/form-data" />
            @csrf 
            @method('PUT')
            <div class="form-group">
                <label for="image">Imagem do evento:</label>
                <img src="/img/events/{{$edit->image}}" alt="" class="image-preview">
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{$edit->title}}">
            </div>
            <div class="form-group">
                <label for="title">Data do evento</label>
                <input type="date" class="form-control" id="date" name="date" value="{{$edit->date->format('Y-m-d')}}"/>
            </div>
            <div class="form-group">
                <label for="title">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento" value="{{$edit->city}}">
            </div>
            <div class="form-group">
                <label for="title">O evento é privado:</label>
                <select name="private" id="private" class="form-control" value="{{$edit->private}}">
                    <option value="0">Não</option>
                    <option value="1" {{$edit->private == 1? "selected='selected'" : 0}}>Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description"  class="form-control" placeholder="Descrição do evento">{{$edit->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="title">Adicione items de ifraestrutura:</label>
                <div class="form-group">
                    <input type="checkbox"  name="items[]" value="Cadeiras"> Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco"> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open Bar"> Open Bar
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open Food"> Open Food
                </div>
            </div>
            <div class="form-group">
                <label for="image">Imagem do evento:</label>
                <input type="file" class="form-control-file" id="image" name="image" placeholder="Imagem do evento" value="{{$edit->image}}">
            </div>
            <input type="submit" class="bnt btn-primary"  value="Concluir ">
        </form>
    </div>
@endsection