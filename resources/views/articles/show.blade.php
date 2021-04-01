<link href="{{ asset('css/showArticle.css') }}" rel="stylesheet" type="text/css" >

@extends('layouts.normal')
    @section('content')
        <section>
            <header class="titulo">
                <h1>{{ $article[0]->title }}</h1>
                <hr>
                <p> POR <strong>{{ $article[0]->name }}</strong> |
                    PUBLICADO EM <strong>{{ date("d/m/Y", strtotime($article[0]->created_at)) }}</strong>
                
                @if($article[0]->created_at != $article[0]->updated_at)
                    | ATUALIZADO EM <strong>{{ date("d/m/Y", strtotime($article[0]->updated_at)) }}</strong></p>
                @endif
            
                <img class="img-fluid" src="{{ asset("img/article/{$article[0]->image}") }}">
            </header>

            <article>
                <div class="artigoCompleto">
                    <p>{!! $article[0]->post !!}</p>
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

                    @guest    
                        <div class="form-group">
                            <label for="comment">Você precisa Está Logado Para Comentar</label>
                            <textarea class="form-control" readonly rows="4"></textarea>
                        </div>
                    @endguest
                </div>

                <div class="outrosComentarios">
                    <h3>Comentários</h3>

                    @foreach($comments as $c)
                        <div class="card col-11">
                            <div class="card-body row">
                                <div class="col-md-3 col-sd-12">
                                    <strong>{{ $c->name }}</strong>
                                    <img src="{{ asset("img/users/user.png") }}">
                                </div> 
                            
                                <div class="col-md-9 col-sd-12">{{ $c->comment }}</div>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="button" onclick="comment({{ $c->id }})" class="btn btn-link">responder</button>
                            </div>
                        
                            <hr />
                        
                            <div class="second-comment">
                            
                                <div class="row container" id="comment-{{ $c->id }}" style="display:none">
                                    <form action="{{ route('addSecoundaryComment', $c->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" value={{ $c->id }} id="commentId" name="commentId">
                                        <input type="hidden" value={{ Auth::user()->id }} id="userId" name="userId">
                                        <input type="hidden" value={{ $article[0]->id }} id="articleId" name="articleId">
                                    
                                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                        @auth
                                            <input class="btn" type="submit" value="Publicar Comentário">
                                        @endauth
                                        @guest
                                            <input class="btn" disabled value="Publicar Comentário">
                                        @endguest
                                    </form>      
                                </div>

                                @foreach ($secoundComment as $sc)
                                    @if($sc->commentId == $c->id)   
                                        <div class="card-body row secoundary-comment">
                                            <div class="col-md-3 col-sd-12">
                                                <strong>{{ $sc->name }}</strong>
                                                <img src="{{ asset("img/users/user.png") }}">
                                            </div> 
                                
                                            <div class="col-md-9 col-sd-12">
                                                {{ $sc->comment }} 
                                            </div>
                                        </div>  
                                    
                                        <hr />
                                    @endif
                                @endforeach
                            </div>    
                        </div>
                    @endforeach    
                </div>              
            </div>
        </section>
    @stop

<script>
    function comment(id){
        let comment = document.getElementById(`comment-${id}`)
        comment.style.display === 'none' ? 
            comment.style.display = 'block' :
            comment.style.display = 'none'
    }
</script>