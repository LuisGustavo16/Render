<?php


namespace App\Http\Controllers\API;
use App\Models\TreinoAmistoso;
use App\Models\Modalidade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TreinoAmistosoController extends Controller
{
    use ApiResponse;
    /*Envia todos os dados para serem listados*/
    public function index() {
        $dados = TreinoAmistoso::all();
        $modalidades = Modalidade::all();
        return $this->success([
            'dados' => $dados,
            'modalidades' => $modalidades,
        ], "Ok...");
    }

    /*Ao clicar em um treino, os dados dele serão enviados*/
    public function enviaTreinoEscolhido(string $idTreino, string $idModalidade) {
        $dados = TreinoAmistoso::find($idTreino);
        $modalidade = Modalidade::find($idModalidade);
        if (isset($dados))
            return view('TreinosAmistosos/listarTreinoEscolhido', compact('dados', 'modalidade'));
    }

    /*Recebe o id de um dado para ser editado e posteriormente edita ele*/
    public function update (string $idTreino, Request $request) {
        $dados = TreinoAmistoso::find($idTreino);
        if (isset($dados)) {
            $dados->idModalidade = $request->input('idModalidade');
            $dados->dia = $request->input('dia');
            $dados->horario = $request->input('horario');
            $dados->genero = $request->input('genero');
            $dados->publico = $request->input('publico');
            $dados->local = $request->input('local');
            $dados->responsavel = $request->input('responsavel');
            $dados->observacao = $request->input('observacao');
            $dados->save();
            return redirect()->route('inicio');
        }
        return redirect()->route('inicio');
    }

    /*Cadastra um novo dado na tabela*/
    public function store(Request $request) {
        $request->validate([
            'idModalidade' => 'required|exists:modalidades,idModalidade',
            'dia' => 'required|date',
            'horario' => 'required',
            'genero' => 'required|string',
            'publico' => 'required|string',
            'local' => 'required|string',
            'responsavel' => 'required|string',
            'observacao' => 'nullable|string',
        ]);
        $dados = TreinoAmistoso::create([
            'dia' => $request->get('dia'),
            'idModalidade' => $request->get('idModalidade'),
            'horario' => $request->get('horario'),
            'genero' => $request->get('genero'),
            'publico' => $request->get('publico'),
            'local' => $request->get('local'),
            'responsavel' => $request->get('responsavel'),
            'observacao' => $request->get('observacao'),
        ]);
            return $this->success([
                'dados' => $dados,
            ], "Treino Cadastrado com sucesso");

    }

    /*Apaga um dado da tabela*/
    public function destroy(string $id) {
        $dados = TreinoAmistoso::find($id);
        if (isset($dados)) {
            $dados->delete();
            return redirect()->route('indexTreino');
        }
    }

    /*Envia os dados para serem editados*/
    public function edit(string $idTreino) {
        $dados = TreinoAmistoso::find($idTreino);
        $modalidades = Modalidade::all();
        $nomeModalidade = Modalidade::find($dados->idModalidade);
        if (isset($dados))
            return view('TreinosAmistosos/editarTreino', compact('dados', 'modalidades', 'nomeModalidade'));
    }

    public function enviaModalidade() {
        $modalidades = Modalidade::all();
        return view('TreinosAmistosos/cadastrarTreino', compact('modalidades'));
    }

}