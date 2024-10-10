<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Models\Reserva;
use App\Models\Aluno;
use Illuminate\Support\Facades\DB;

class ReservasController extends Controller
{
    use ApiResponse;
    
    public function index() {
        $dados = Reserva::all();
        return $this->success([
            'dados' => $dados,
        ], "Ok...");
    }

    public function store(Request $request) {
        $reserva = Reserva::create([
            'idAluno' => $request->get('idAluno'),
            'dia' => $request->get('dia'),
            'local' => $request->get('local'),
            'horarioInicio' => $request->get('horarioInicio'),
            'horarioFim' => $request->get('horarioFim'),
            'finalidade' => $request->get('finalidade'),
            'status' => 'P',
            'tipo' => $request->get('tipo'),
            'numeroPessoas' => $request->get('numeroPessoas'),
        ]);
        return $this->success([
            'reserva' => $reserva,
        ], "OK...");
    }
}
