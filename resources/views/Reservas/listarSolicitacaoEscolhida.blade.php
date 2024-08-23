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
        <a class="aceitar" href="/reservas/cadastrarReserva/{{$dados->idSolicitacaoReserva}}">Aceitar</a>
        <a class="recusar" href="/reservas/apagar/{{$dados->idSolicitacaoReserva}}">Recusar</a>
    </div>
    </div>
    
    @endsection