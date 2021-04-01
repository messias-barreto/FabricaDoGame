<script src="https://kit.fontawesome.com/cd1980e5fa.js" crossorigin="anonymous"></script>

<style>
    tr {
        font-size: 15px;
        font-family: sans-serif;
        background-color: #FFFAF0;
        border: 1px solid #000000;
    }

    tr:hover{
        background-color: #FFFAD0;
    }
</style>

@extends('layouts.protected')
@section('content')
        <div class="container">
          @if(session('success'))
            <div class="row">
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong><i class="fas fa-check-circle"></i></strong> {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            </div>
          @endif
            
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Data da Publicação</th>
                    <th scope="col">Ultima Atualização</th>
                    <th scope="col">Opções</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($article as $art)
                        <a href="{{ url('articleedit/'.$art->id) }}">
                            <tr>
                                <td>{{ $art->title }}</td>
                                <td>{{ date("d/m/Y", strtotime($art->created_at)) }}</td>
                                <td>{{ date("d/m/Y", strtotime($art->updated_at)) }}</td>
                                <td>
                                    <div class="pos-f-t">
                                        <div class="collapse" id="{{ $art->id }}">
                                          <div class="bg-dark p-4">
                                            <ul class="list-group">
                                                <a href="{{ url('updatearticle/'.$art->id) }}">
                                                    <li class="list-group-item"><i class="fas fa-edit"></i> Atualizar o Artigo</li>
                                                </a>    
                                                <li class="list-group-item">Atualizar a Imagem do Banner</li>
                                                <li class="list-group-item">Bloquear o Artigo</li>
                                                <li class="list-group-item">Remover o Artigo</li>
                                            </ul>
                                          </div>
                                        </div>
                                        <nav class="navbar navbar-light">
                                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#{{ $art->id }}" aria-controls="{{ $art->id }}" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                          </button>
                                        </nav>
                                      </div>
                                </td>
                            </tr>
                        </a>
                    @endforeach
                </tbody>
              </table>

        </div>
   
@stop