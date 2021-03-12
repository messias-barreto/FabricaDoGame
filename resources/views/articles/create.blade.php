@extends('layouts.normal')
@section('content')
    <section class="container-fluid">
        <form action="{{ route('addArticle') }}" method="POST">
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
        <!--
            <div class="custom-file col-4">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">Selecione a Imagem do Artigo</label>
            </div>
        -->
            <br />

            <div class="form-group">
                <textarea class="form-control" id="post" name="post" rows="12">Digite O Artigo Aqui</textarea>
            </div>
            <hr>
            <input class="btn" type="submit" value="Publicar Artigo">
        </form>
    </section>
@stop