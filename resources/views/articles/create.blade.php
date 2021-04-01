@include('quill')

@extends('layouts.protected')
@section('content')
    <section class="container-fluid">
        <form action="{{ route('addArticle') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="userId" name="userId" value={{ Auth::user()->id }} >
            <div class="form-row">
                <div class="col-8">
                    <label for="nome">Titulo</label>
                    <input type="text" class="form-control" id="title" name="title">
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
        
            <div class="custom-file col-4">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">Selecione a Imagem do Artigo</label>
            </div>
        
            <br />

            <div class="form-group">
                <div id="quilPost" rows="12"></div>
                <input type="hidden" id="post" name="post">
            </div>
            <hr>
            <input class="btn" type="submit" value="Publicar Artigo">
        </form>
    </section>

    <script src="{{ asset('js/quill.js') }}"> </script>
@stop