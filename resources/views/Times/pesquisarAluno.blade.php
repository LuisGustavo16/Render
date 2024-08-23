@extends ('cabecalho')
@section('content')
<div class="fundo">
    <form class="" action="/times/pesquisarAluno/{{$idTime}}" method="POST">
        @csrf
        <input  type="text" name="nomeAluno">

        <button class="botaoCadastrarTime" type="submit">Enviar</button>
    </form>
</div>
@endsection