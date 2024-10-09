<?php
$aux = false;
$classe = 'branco';
$status = true;
?>
@extends ('cabecalho')
@section('content')
<div class="fundo">
    @if (session()->get('danger') && $status)
        <div class="divDanger">
            <h2>{{session()->get('danger')}}</h2>
            <a class="XSaida" href="" onclick="{{$status = false}}">X</a>
        </div>
    @elseif (session()->get('success') && $status)
        <div class="divSuccess">
            <h2>{{session()->get('success')}}</h2>
            <a class="XSaida" href="" onclick="{{$status = false}}">X</a>
        </div>
    @endif
    <form class="formDestroyMany" action="/treino_amistosos/apagar" method="POST">
        @csrf
        <div class="divFormDestroyMany">
            <table>
                <caption>TREINOS & AMISTOSOS</caption>
                <thead>
                    <tr class="amarelo">
                        <th>Modalidade</th>
                        <th>Dia</th>
                        <th>Horário</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dados as $item)
                                        <?php 
                                                                        if ($aux == true) {
                            $classe = 'amarelo';
                            $aux = false;
                        } elseif ($aux == false) {
                            $classe = 'branco';
                            $aux = true;
                        }
                                                                    ?>
                                        <tr class="{{$classe}}">
                                            @foreach ($modalidades as $modalidade)
                                                @if ($modalidade->idModalidade == $item->idModalidade)
                                                    <td>{{$modalidade->nome}} {{$item->genero}}</td>
                                                    <td>{{$item->dia}}</td>
                                                    <td>{{$item->horario}}</td>
                                                    <td>
                                                        <a
                                                            href="../treino_amistosos/selecionado/{{$item->idTreino}}/{{$modalidade->idModalidade}}">Ver</a>
                                                        <a href="../treino_amistosos/editar/{{$item->idTreino}}">Editar</a>
                                                        <a href="../treino_amistosos/apagar/{{$item->idTreino}}"
                                                            onclick="return confirm('Deseja apagar o treino do dia {{$item->dia}} ?')">Excluir</a>
                                                        <input type="checkbox" name="treino[]" value="{{$item->idTreino}}">
                                                    </td>
                                                @endif
                                            @endforeach
                                        </tr>

                    @endforeach
                </tbody>
            </table>
            <div class="divBotao">
                <button class="botaoDestroyMany" type="submit">Apagar Selecionados</button>

            </div>
        </div>
    </form>
</div>
@endsection