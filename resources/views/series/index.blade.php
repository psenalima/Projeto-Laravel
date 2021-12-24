@extends('layout')

@section('cabecalho')
séries
@endsection


@section('conteudo')
@if(!empty($mensagem))
    <div class="alert alert-sucess">{{$mensagem}}</div>
@endif
    
     
    <a href="{{route('form_criar_serie')}}" class="btn btn-dark mb-2"> Adicionar</a>
    <ul class = "list-group">
        <?php foreach ($series as $serie): ?>
            <li class = "list-group-item d-flex justify-content-between align-items-center">
                {{$serie->nome}}

                <form method="POST" action="/series/{{addslashes($serie->id)}}" onsubmit="return confirm('tem certeza?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"><i class="fas fa-minus-square"></i></button>
                </form>
            
            </li>
        <?php endforeach; ?>
    </ul>
@endsection
  