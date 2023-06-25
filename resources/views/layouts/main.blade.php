<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap -->    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
        <!-- Styles -->
        <link rel="stylesheet" href="/css/style.css" >

    </head>
    <body class="antialiased">
        <header class="navbar navbar-expand navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    <img src="/img/hdcevents_logo.svg" alt="">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a href="/events/create" class="nav-link">Criar eventos</a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link">Cadastrar</a>
                    </li>

                </ul>
            </div>
        </header>

        <main class="contaier-fluid">
            <div class="row">
                {{--Verifica se possui alguma msg de sessão, se sim, exibe na tela--}}
                @if(session('msg'))
                    <p class="msg">{{session('msg')}}</p>
                @endif
                @yield('content')

            </div>
        </main>
       <footer>
            <p>HDC Events &copy; 2023</p>
       </footer>

    <script src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>