@extends('layouts.main')
@section('title', 'Criar evento')

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie o seu evento</h1>
        <form action="/events" method="post" enctype="multipart/form-data" />
            @csrf 
            {{--sem isso o Laravel não deixa enviar os dados para o banco de dados--}}
            {{--O Laravel identifica os campos pela propriedade name--}}
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">
            </div>
            <div class="form-group">
                <label for="title">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento">
            </div>
            <div class="form-group">
                <label for="title">O evento é privado:</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description"  class="form-control" placeholder="Descrição do evento"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Adicione items de ifraestrutura:</label>
                <div class="form-group">
                    {{--Necessário colocar [] no name para o laravel entender que será mais de um item com o mesmo name --}}
                    <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
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
                <input type="file" class="form-control-file" id="image" name="image" placeholder="Imagem do evento">
            </div>
            <input type="submit" class="bnt btn-primary"  value="Criar Evento">
        </form>
    </div>
@endsection()