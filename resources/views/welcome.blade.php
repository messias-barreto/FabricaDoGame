<style>
  .artigo{
    background-color: rgb(228, 238, 237);
    border: 2px solid rgb(48, 28, 5);
    height: 200px;
  }

  .artigo:hover{
    background-color: rgb(240, 242, 245);
    border: 3px solid #000000;
  }
    

   .artigos p {
    max-width: 300ch;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    font-size: 16px;
  }

  .artigos h3 {
    font-size: 20px;
    font-family: sans-serif;
  }
</style>

@extends('layouts.normal')

@section('content')
<section class="carousel-top">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('https://static-wp-tor15-prd.torcedores.com/wp-content/uploads/2019/07/screenshot_61.png')}}" alt="First slide">
      </div>

      <div class="carousel-item">
        <img src="{{asset('https://www.casasbahia-imagens.com.br/criacao/03-hotsite/2020/07-jul/08/ps5/bannertv-ps5.jpg')}}" alt="Second slide">
      </div>

      <div class="carousel-item">
        <img src="{{asset('https://jornalpequeno.com.br/media/2020/12/IMG-20201203-WA0002.jpg')}}" alt="Third slide">
      </div>

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
</section>

<section class="container">
  <header class="titulo-artigo">
    <span><h2>Ultimos Artigos</h2><span>
  </header>

  <div class="row">
    @foreach ($articles as $art)
    <article class="col-6 artigos">
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
@stop
