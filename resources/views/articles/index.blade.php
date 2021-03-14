@extends('layouts.normal')

@section('content')
<section class="container">
    <header class="titulo-artigo">
      <span><h2>Artigos</h2><span>
    </header>

    <hr>
  
    <div class="row">
    @foreach ($articles as $art)
    <article class="col-6">
        <a href="{{ url('article/'.$art->id) }}">
          <div class="artigo card">
            <img src="{{ url("img/article/{$art->image}") }}">
            <div class="card-body">
              <h3 class="card-title">{{ $art->title }}</h3>
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