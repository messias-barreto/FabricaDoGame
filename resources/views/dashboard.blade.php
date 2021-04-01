<style>
    .card:hover{
        border: 2px solid #000000;
    }

    .card a:link {
        text-decoration: none;
        color: #000000;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 container">
        @if(session('success'))
            <div class="row">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><i class="fas fa-check-circle"></i></strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        

        <div class="row">
            <div class="col-4 cards">     
                <a href="{{ url('cadarticle') }}">   
                    <div class="card" style="width: 18rem;" id="card">
                        <img class="card-img-top" src="{{asset('img/article.png')}}">
                        <div class="card-body">
                            <h5 class="card-title text-center">Criar um Novo Artigo</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-4 cards">     
                <a href="{{ url('configurearticle', Auth::user()->id) }}">   
                    <div class="card" style="width: 18rem;" id="card">
                        <img class="card-img-top" src="{{asset('img/updateArticle.png')}}">
                        <div class="card-body">
                            <h5 class="card-title text-center">Atualizar um Artigo</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-4 cards">     
                <a href="{{ url('cadarticle') }}">   
                    <div class="card" style="width: 18rem;" id="card">
                        <img class="card-img-top" src="{{asset('img/iconModUsers.png')}}">
                        <div class="card-body">
                            <h5 class="card-title text-center">Atualizar Usuários</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
