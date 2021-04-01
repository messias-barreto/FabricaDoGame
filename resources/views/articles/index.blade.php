@extends('layouts.normal')

@section('content')
<section class="container">
    <header class="titulo-artigo">
      <span><h2>Artigos</h2><span>
    </header>

    <hr>
  
    <div class="row">
    @foreach ($articles as $art)
    <article class="col-4">
        <a href="{{ url('article/'.$art->id) }}">
          <div class="artigo card">
            <img src="{{ url("img/article/{$art->image}") }}">
            <div class="card-body">
              <h3 class="card-title">{{ $art->title }}</h3>
              <hr>
                @if($art->created_at != $art->updated_at)
                  <p>ATUALIZADO EM <strong>{{ date("d/m/Y", strtotime($art->updated_at)) }}</strong></p>
                  @else
                    <p>PUBLICADO EM <strong>{{ date("d/m/Y", strtotime($art->created_at)) }}</strong></p>
                @endif
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