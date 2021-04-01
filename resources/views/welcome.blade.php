<style>
  .maisArtigos {
    text-align: center;
    margin-top: 30px;
    margin-bottom: 30px;
    font-size: 30px;
    font-family: fantasy;
    color: #363636;
  }

  .maisArtigos a:link{
    text-decoration: none;
    color: #363636;
  }

</style>

@extends('layouts.normal')
  @section('content')
    <header class="carousel-top">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>

      @php
        $i = 0
      @endphp

      <div class="carousel-inner">
        @foreach ($articles as $art)
          @if($i == 0)
            <div class="carousel-item active">
          @else
            <div class="carousel-item">
          @endif
              <img src="{{ url("img/article/{$art->image}") }}" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <h5>{{ $art->title }}</h5>
                <p>
                  @if($art->created_at != $art->updated_at)
                    <p>ATUALIZADO EM <strong>{{ date("d/m/Y", strtotime($art->updated_at)) }}</strong></p>
                  @else
                    <p>PUBLICADO EM <strong>{{ date("d/m/Y", strtotime($art->created_at)) }}</strong></p>
                  @endif
                </p>
              </div>
            </div>
          
            @php
              $i++;
            @endphp
        @endforeach
      </div>

      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <section class="container">
    <header class="titulo-artigo">
      <span><h2>Ultimas Noticias</h2><span>
    </header>
    
    <hr class="hr"/>
    
    <div class="row">
      @foreach ($news as $n)
        <article class="col-6 artigos">
          <a href="{{ url('article/'.$n->id) }}">
            <div class="artigo card">
              <img src="{{ asset("img/article/{$n->image}") }}" rel="stylesheet">
              <div class="card-body">
                <h3 class="card-title">{{ $n->title }}</h3>
                <hr />
                <p>
                  @if($art->created_at != $art->updated_at)
                    <p>ATUALIZADO EM <strong>{{ date("d/m/Y", strtotime($art->updated_at)) }}</strong></p>
                    @else
                      <p>PUBLICADO EM <strong>{{ date("d/m/Y", strtotime($art->created_at)) }}</strong></p>
                  @endif
                </p>
              </div>
            </div>  
          </a>
        </article>
      @endforeach
    </div>

    <header class="titulo-artigo">
      <span><h2>Ultimos Artigos</h2><span>
    </header>  
      
    <hr class="hr"/>

    <div class="row">
      @foreach ($articles as $art)
        <article class="col-4 ultimos-artigos">
          <a href="{{ url('article/'.$art->id) }}">
            <div class="artigo card">
              <img src="{{ asset("img/article/{$art->image}") }}" rel="stylesheet">
              <div class="card-body">
                <h3 class="card-title">{{ $art->title }}</h3>
                <hr />
                <p>
                  @if($art->created_at != $art->updated_at)
                    <p>ATUALIZADO EM <strong>{{ date("d/m/Y", strtotime($art->updated_at)) }}</strong></p>
                    @else
                      <p>PUBLICADO EM <strong>{{ date("d/m/Y", strtotime($art->created_at)) }}</strong></p>
                  @endif
                </p>
              </div>
            </div>  
          </a>
        </article>
      @endforeach
    </div>

    <div class="maisArtigos">
      <p><a href="{{ url('/articles') }}">Mais Artigos</a></p>
    </div>
  </section>
@stop

