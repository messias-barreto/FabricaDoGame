<!-- Main Quill library -->
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

<!-- Theme included stylesheets -->
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

<!-- Core build with no theme, formatting, non-essential modules -->
<link href="//cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">
<script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script>


<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

@extends('layouts.normal')
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
                <input type="hidden" id="post" name="post">
            </div>
            <hr>
            <input class="btn" type="submit" value="Atualizar Artigo">
        </form>
    </section>

    <script>
        var options = [
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [{'script': 'sub'}, {'script': 'super'}],
            [{'direction': 'rtl'}],
            [{'size': ['small', false, 'large', 'huge']}],
            ['link', 'image', 'video']
        ]

        var quill = new Quill('#quilPost', {
            modules: {
                toolbar: options
            },

            placeholder: 'Digite a Artigo Aqui',
            theme: 'snow'
        });

        quill.on('text-change', function() {
            document.getElementById("post").value = quill.root.innerHTML;
        });
      </script>
@stop