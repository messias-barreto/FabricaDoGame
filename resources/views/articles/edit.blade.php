@include('quill')

@extends('layouts.protected')
@section('content')
    <section class="container-fluid">
        <form action="{{ route('updateArticle', $article[0]->id) }}" method="POST">
            @csrf
            @method('PUT')
          
            <input type="hidden" id="userId" name="userId" value={{ Auth::user()->id }} >
            <div class="form-row">
                <div class="col-8">
                    <label for="nome">Titulo</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $article[0]->title }}">
                </div>

                <div class="col-4">
                    <label for="subject">Noticia</label>
                    <select class="form-control" id="subject" name="subject">
                        <option>Noticia</option>
                        <option>E-Sports</option>
                        <option>PlayStation</option>
                        <option>X-Box</option>
                        <option>Nintendo</option>
                    </select>
                </div>
            </div>
        
            <br />

            <div class="form-group">
                <div id="quilPost" rows="12">{!! $article[0]->post !!}</div>
                <input type="hidden" id="post" name="post" value="{{ $article[0]->post }}">
            </div>
            <hr>
            <input class="btn" type="submit" value="Atualizar Artigo">
        </form>
    </section>

    <script src="{{ asset('js/quill.js') }}"> </script>
@stop