<style>
    .titulo h1{
        text-align: center;
        font-size: 40px;
        font-family: sans-serif;
    }

    .titulo img {
        width: 600px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        border: 2px solid #000000;
        margin-top: 20px;
    }

    .artigo{
        width: 1000px;
        margin-left: 120px;
        margin-top: -50px;
        text-align: center;
    }

    .comentario {
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .outrosComentarios {
        margin-top: 30px;
    }

    .card{
        margin-top: 20px;
        margin-left: 5px;
    }

    .card strong {
        font-size: 18px;
        font-family: serif;
    }
</style>

@extends('layouts.normal')

@section('content')
    <section>
        <header class="titulo">
            <h1>{{ $article[0]->title }}</h1>
            <img src={{ asset('img/notImage.png') }}>
        </header>

        <article>
            <div class="artigo">
                <p>{{ $article[0]->post }}</p>
            </div>
        </article>
    </section>

    <section>
        <div class="container">
            <div class="comentario">
                @auth    
                    <form action="{{ route('addComment') }}" method="POST">
                        @csrf
                        <input type="hidden" value={{ $article[0]->id }} id="articleId" name="articleId">
                        <input type="hidden" value={{ Auth::user()->id }} id="userId" name="userId">
                        <div class="form-group">
                            <label for="comment">Deixe seu Comentário</label>
                            <textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
                        </div>
                        <input class="btn" type="submit" value="Publicar Comentário">
                    </form>
                @endauth
            </div>

            <div class="outrosComentarios">
                <h3>Comentários</h3>

                @foreach($comments as $c)
                    <div class="card col-10">
                        <div class="card-body row">
                            <div class="col-4"><strong>{{ $c->name }}</strong></div> <div class="col-8">{{ $c->comment }}.</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@stop