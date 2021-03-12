<style>
  p{
    max-width: 300ch;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
  }

  .artigo{
    background-color: rgb(228, 238, 237);
    border: 2px solid rgb(48, 28, 5);
    height: 200px;
  }

  .artigo:hover{
    background-color: rgb(240, 242, 245);
    border: 3px solid #000000;
  }

</style>

@extends('layouts.normal')

@section('content')
<section class="container">
    <header class="titulo-artigo">
      <span><h2>Artigos</h2><span>
    </header>
  
    <div class="row">
    @foreach ($articles as $art)
    <article class="col-6">
        <a href="{{ url('article/'.$art->id) }}">
          <div class="artigo card">
            <img src="{{ asset('img/icone.png') }}" rel="stylesheet">
            <div class="card-body">
              <h3 class="card-title">{{ $art->title }}</h3>
              <hr>
              <p class="card-text">{{ $art->post }}</p>
            </div>
          </div>  
        </a>
    </article>
 
    @endforeach
  </div>
  </section>

    <div>
        {{ $articles->links() }}
    </div>
@stop