<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fabrica do Game</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            section{
              margin-bottom: 30px;
            }

            article{
              margin: 70px 0px -30px 0px;
            }

            article a:link{
              text-decoration: none;
            }

            article h2 {
              font-family: serif;
              font-size: 25px;
            }

            article p {
              font-family: serif;
              font-size: 20px;
              padding: 10px 0px 10px 20px;
            }

            .logo{
              width: 70px;
            }

            .carousel{ 
              flex: 1;
              border: 1px solid #000000;
            }

            .carousel img {
              width: 100%;
              height: 600px;
            }

            .carousel span {
              width: 100%;
              height: 100px;
            }

            .container img {
              width: 100px;
              height: 100px;
              border-radius: 50%;
              border: 2px solid #000000;
              float: left;
            }

            .container {
              flex-direction: row;
              width: 100%;
            }

            .titulo-artigo h2 {
              width: 450px;
              font-size: 35px;
              font-family: sans-serif;
              margin-left: 55px;
              align-items: center;

            }
        </style>
    </head>

    <body class="antialiased">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"><img class="logo" src="{{ asset('img/icone.png') }}" rel="stylesheet"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>

                    <li class="nav-item active">
                      <a class="nav-link" href="{{ url('/articles') }}">Artigos</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="#">Detonados</a>
                    </li>
                  </ul>
                </div>
              </nav>
        </header>

        <div>
            @yield('content')
        </div>

        <div class="relative flex items-top justify-center">
          @if (Route::has('login'))
              <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                  @auth
                    @if(Auth::user()->level >= 2)
                      <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                    <li class="nav-item">
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Sair') }}
                        </x-jet-dropdown-link>
                    </form>
                    </li>
                    @endif
                  @else
                      <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                      @if (Route::has('register'))
                          <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                      @endif
                  @endauth
              </div>
          @endif      
      </div>
    </body>
</html>
