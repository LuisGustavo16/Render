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

class ModalidadeController extends Controller
{
    use ApiResponse;
    /*Envia todos os dados para serem listados*/
    public function index() {
        $dados = Modalidade::all();
        return $this->success([
            'dados' => $dados,
        ], "Ok...");
    }

    /*Recebe o id de um dado para ser editado e posteriormente edita ele*/
    public function update (string $idModalidade, Request $request) {
        $dados = Modalidade::find($idModalidade);
        if (isset($dados)) {
            $dados->nome = $request->input('nome');
            $dados->save();
            return redirect()->route('indexModalidade');
        }
        return redirect()->route('indexModalidade');
    }

    /*Cadastra um novo dado na tabela*/
    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|string',
        ]);
        $dados = Modalidade::create([
            'nome' => $request->get('nome'),
        ]);
        return $this->success([
            'dados' => $dados,
        ], "Ok...");
    }

    /*Apaga um dado da tabela*/
    public function destroy(string $idModalidade) {
        $dados = Modalidade::find($idModalidade);
        if (isset($dados)) {
            $dados->delete();
            return redirect()->route('indexModalidade');
        }
    }

    /*Envia os dados para serem editados*/
    public function edit(string $idModalidade) {
        $dados = Modalidade::find($idModalidade);
        if (isset($dados))
            return view('Modalidades/editarModalidade', compact('dados'));
    }
}
