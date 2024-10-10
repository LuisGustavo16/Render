<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use App\Models\SolicitacaoReserva;
use Illuminate\Http\Request;
use App\Models\Aluno;
use Illuminate\Support\Facades\DB;

class controllerReservas extends Controller
{
    /*Ao clicar em uma reserva, os dados dele serão enviados*/
    public function enviaReservaEscolhida(string $idReserva) {
        $dados = Reserva::find($idReserva);
        $aluno = Aluno::find($dados->idAluno);
        if (isset($dados))
            return view('Reservas/listarReservaEscolhida', compact('dados', 'aluno'));
    }

    /*Envia todas as reservas com base no status para serem listadas*/
    public function index(string $status) {
        $dados = DB::table('reservas')->select(columns: "*")->where(DB::raw('status'), 'like', $status) ->get();
        return view('Reservas/listarReservas', compact('dados'));
    }

    public function aceitarNegarReserva(string $idReserva, string $status) {
        $reserva = Reserva::find($idReserva);
        if ($status == 'A') {
            $reserva->status = 'A';
            $reserva->save();
        } else if ($status == 'N') {
            $reserva->delete();
        }
        return redirect('/reservas/listarReservas/P');
    }
}
