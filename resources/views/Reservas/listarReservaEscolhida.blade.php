@extends ('cabecalho')
@section('content')
<div class="fundo">
    <div class="tabela">
    <div class="divListar solicitacao">
        <div class="campoListarTreinoEscolhido"><h1>Aluno:</h1> <h2>{{$aluno->nome}} / {{$aluno->turma}} {{$aluno->curso}}</h2></div>
        <div class="campoListarTreinoEscolhido"><h1>Dia:</h1> <h2>{{$dados->dia}}</h2></div>
        <div class="campoListarTreinoEscolhido"><h1>Local:</h1> <h2>{{$dados->local}}</h2></div>
        <div class="campoListarTreinoEscolhido"><h1>Horário de Inicio:</h1> <h2>{{$dados->horarioInicio}}</h2></div>
        <div class="campoListarTreinoEscolhido"><h1>Horário de Inicio:</h1> <h2>{{$dados->horarioInicio}}</h2></div>
        <div class="campoListarTreinoEscolhido observacao"><h1>Finalidade:</h1> <h2>{{$dados->finalidade}}</h2></div>
    </div>
    <div class="centralizarBotoes ">
        @if ($dados->status == 'P')
            <a class="recusar" href="/reservas/aceitarNegar/{{$dados->idReserva}}/N">Excluir</a>
            <a class="aceitar" href="/reservas/aceitarNegar/{{$dados->idReserva}}/A">Aceitar</a>
        @endif
    </div>
    </div>
    
    @endsection