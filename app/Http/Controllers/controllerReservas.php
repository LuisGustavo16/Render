<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use App\Models\SolicitacaoReserva;
use Illuminate\Http\Request;
use App\Models\Aluno;

class controllerReservas extends Controller
{
    /*Envia todas as reservas para serem listadas*/
    public function index() {
        $dados = Reserva::all();
        return view('Reservas/listarReservas', compact('dados'));
    }

    /*Ao clicar em uma reserva, os dados dele serão enviados*/
    public function enviaReservaEscolhido(string $idReserva) {
        $dados = Reserva::find($idReserva);
        $aluno = Aluno::find($dados->idAluno);
        if (isset($dados))
            return view('Reservas/listarReservaEscolhida', compact('dados', 'aluno'));
    }

    /*Envia todas as solicitações de reservas para serem listadas*/
    public function indexSolicitacao() {
        $dados = SolicitacaoReserva::all();
        return view('Reservas/listarSolicitacaoReserva', compact('dados'));
    }

    public function enviaSolicitacaoEscolhido(string $idSolicitacao) {
        $dados = SolicitacaoReserva::find($idSolicitacao);
        $aluno = Aluno::find($dados->idAluno);
        if (isset($dados))
            return view('Reservas/listarSolicitacaoEscolhida', compact('dados', 'aluno'));
    }

    /*Cadastra um novo dado na tabela*/
    public function store(string $idSolicitacao) {
        $solicitacao = SolicitacaoReserva::find($idSolicitacao);
        $dados = new Reserva();
        $dados->idAluno = $solicitacao->idAluno;
        $dados->dia = $solicitacao->dia;
        $dados->local = $solicitacao->local;
        $dados->horarioInicio = $solicitacao->horarioInicio;
        $dados->horarioFim = $solicitacao->horarioFim;
        $dados->finalidade = $solicitacao->finalidade;
        $dados->save();
        $solicitacao->delete();
        return redirect()->route('inicio');
    }

    public function destroy(string $idSolicitacao) {
        $dados = SolicitacaoReserva::find($idSolicitacao);
        if (isset($dados)) {
            $dados->delete();
            return redirect()->route('indexSolicitacao');
        }
    }
}
