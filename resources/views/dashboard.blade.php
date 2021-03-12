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

    <div class="py-12">
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
    </div>
</x-app-layout>
