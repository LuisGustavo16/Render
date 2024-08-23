<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TreinoAmistosoController;

//////////////////////////////////////////////////////////
/*Rotas para as páginas referentes aos Treinos/Amistosos*/
//////////////////////////////////////////////////////////

Route::get('/CadastrarTreino', function () {
    return view('TreinosAmistosos/cadastrarTreino');
}) -> name('novoTreino');

Route::get('/ListarTreino', function () {
    return view('TreinosAmistosos/listarTreinos');
}) -> name('listarTreinos');

Route::get('/ListarTreinoEscolhido', function () {
    return view('TreinosAmistosos/listarTreinoEscolhido');
}) -> name('listarTreinoEscolhido');


//////////////////////////////////////////////////
/*Rotas para as páginas referentes à Modalidades*/
//////////////////////////////////////////////////
Route::get('/cadastrarModalidade', function () {
    return view('Modalidades/cadastrarModalidade');
}) -> name('novaModalidade');

Route::get('/ListarModalidades', function () {
    return view('Modalidades/listarModalidades');
}) -> name('listarModalidades');

//////////////////////////////////////////////////
/*Rotas para as páginas referentes às Reservas*/
//////////////////////////////////////////////////
Route::get('/listarReservas', function () {
    return view('Reservas/listarReservas');
}) -> name('listarReservas');

Route::get('/listarReservaEscolhida', function () {
    return view('Reservas/listarReservaEscolhida');
}) -> name('listarReservaEscolhida');

Route::get('/listarSolicitacoes', function () {
    return view('Reservas/listarSolicitacaoReserva');
}) -> name('listarSolicitacoes');

Route::get('/listarSolicitacaoEscolhida', function () {
    return view('Reservas/listarSolicitacaoEscolhida');
}) -> name('listarSolicitacaoEscolhida');

//////////////////////////////////////////////////////////
/*Rotas para as páginas referentes aos Times*/
//////////////////////////////////////////////////////////
Route::get('/CadastrarTime', function () {
    return view('Times/cadastrarTime');
}) -> name('novoTime');

Route::get('/formPesquisarAluno', function () {
    return view('Times/pesquisarAluno');
});

//////////////////////////////////////////////////////////
/*Rotas para as páginas referentes às Noticias*/
//////////////////////////////////////////////////////////
Route::get('/noticias/novaNoticia', function () {
    return view('Noticias/cadastrarNoticia');
}) -> name('novaNoticia');

////////////////////////////////////////////////////////
/*Rotas do controller da tabela de Treinos e Amistosos*/
////////////////////////////////////////////////////////
Route::get ('/treino_amistosos/listarTreinos', [App\Http\Controllers\controllerTreinoAmistoso::class, 'index']) ->name('indexTreino'); // Rota para exibir
Route::post('/treino_amistosos/cadastrarTreino', [App\Http\Controllers\controllerTreinoAmistoso::class, 'store'])->name('cadastrarTreino'); // Rota para cadastrar
Route::get('/treino_amistosos/selecionado/{idTreino}/{idModalidade}', [App\Http\Controllers\controllerTreinoAmistoso::class, 'enviaTreinoEscolhido']); // Rota que envia o dado para ser vizualizado
Route::post('/treino_amistosos/atualizar/{idTreino}', [App\Http\Controllers\controllerTreinoAmistoso::class, 'update']); // Rota para editar
Route::get('/treino_amistosos/editar/{idTreino}', [App\Http\Controllers\controllerTreinoAmistoso::class, 'edit']); // Rota que manda o dado a ser editado para o formulário
Route::get('/treino_amistosos/apagar/{idTreino}', [App\Http\Controllers\controllerTreinoAmistoso::class, 'destroy']); // Rota para apagar
Route::get ('/treino_amistosos', [App\Http\Controllers\controllerTreinoAmistoso::class, 'enviaModalidade'])->name('enviaModalidadesCadastro'); // Rota que envia as modalidades para usar de opcao

////////////////////////////////////////////////
/*Rotas do controller da tabela de Modalidades*/
////////////////////////////////////////////////
Route::get ('/modalidades/ListarModalidades', [App\Http\Controllers\controllerModalidades::class, 'index']) ->name('indexModalidade'); // Rota para exibir
Route::post('/modalidades/cadastrarModalidade', [App\Http\Controllers\controllerModalidades::class, 'store'])->name('cadastrarModalidade'); // Rota para cadastrar
Route::post('/modalidades/atualizar/{idModalidade}', [App\Http\Controllers\controllerModalidades::class, 'update']); // Rota para editar
Route::get('/modalidades/editar/{idModalidade}', [App\Http\Controllers\controllerModalidades::class, 'edit']); // Rota que manda o dado a ser editado para o formulário
Route::get('/modalidades/apagar/{idModalidade}', [App\Http\Controllers\controllerModalidades::class, 'destroy']); // Rota para apagar

/////////////////////////////////////////////
/*Rotas do controller da tabela de Reservas*/
/////////////////////////////////////////////
Route::get ('/reservas/listarReservas', [App\Http\Controllers\controllerReservas::class, 'index']) ->name('indexReserva'); // Rota para exibir as reservas
Route::get ('/reservas/selecionadoReserva/{idReserva}', [App\Http\Controllers\controllerReservas::class, 'enviaReservaEscolhido']); // Rota que envia a reserva escolhida para ser vizualizado
Route::get ('/reservas/listarSolicitacaoReserva', [App\Http\Controllers\controllerReservas::class, 'indexSolicitacao']) ->name('indexSolicitacao'); // Rota para exibir as solicitações
Route::get ('/reservas/selecionadoSolicitacao/{idSolicitacaoReserva}', [App\Http\Controllers\controllerReservas::class, 'enviaSolicitacaoEscolhido']);// // Rota que envia a solicitação escolhida para ser vizualizado
Route::get('/reservas/apagar/{idSolicitacaoReserva}', [App\Http\Controllers\controllerReservas::class, 'destroy']); // Rota que apaga uma solicitação de reserva
Route::get('/reservas/cadastrarReserva/{idSolicitacaoReserva}', [App\Http\Controllers\controllerReservas::class, 'store']); // Quando a solicitação for aceita, a reserva será criada

////////////////////////////////////////////////
/*Rotas do controller da tabela de Times*/
////////////////////////////////////////////////
Route::get ('/times/listarTimes', [App\Http\Controllers\controllerTimes::class, 'index']) ->name('indexTime'); // Rota para exibir
Route::post('/times/cadastrarTimes', [App\Http\Controllers\controllerTimes::class, 'store'])->name('cadastrarTime'); // Rota para cadastrar
Route::get('/times/selecionado/{idTreino}/{idModalidade}', [App\Http\Controllers\controllerTimes::class, 'enviaTimeEscolhido']); // Rota que envia o dado para ser vizualizado
Route::post('/times/atualizar/{idTime}', [App\Http\Controllers\controllerTimes::class, 'update']); // Rota para editar
Route::get('/times/editar/{idTime}', [App\Http\Controllers\controllerTimes::class, 'edit']); // Rota que manda o dado a ser editado para o formulário
Route::get('/times/apagar/{idTime}', [App\Http\Controllers\controllerTimes::class, 'destroy']); // Rota para apagar
Route::get('/times/retirarAluno/{idAluno}/{idTime}', [App\Http\Controllers\controllerTimes::class, 'deleteAlunoTime']);
Route::get ('/times/enviaModalidades', [App\Http\Controllers\controllerTimes::class, 'enviaModalidade'])->name('enviaModalidadeTimes'); 
Route::post ('/times/pesquisarAluno/{idTime}', [App\Http\Controllers\controllerTimes::class, 'pesquisarAluno'])->name('pesquisarAluno');
Route::get ('/times/mandaTime/{idTime}', [App\Http\Controllers\controllerTimes::class, 'enviaTime']); 


////////////////////////////////////////////////
/*Rotas do controller da tabela de Noticias*/
////////////////////////////////////////////////
Route::get ('/', [App\Http\Controllers\controllerNoticias::class, 'index']) ->name('inicio'); // Rota para exibir
Route::post('/noticias/cadastrarNoticia', [App\Http\Controllers\controllerNoticias::class, 'store'])->name('cadastrarNoticia'); // Rota para cadastrar
Route::get('/noticias/selecionado/{idNoticia}', [App\Http\Controllers\controllerNoticias::class, 'enviaNoticiaEscolhida']); // Rota que manda os dados de uma noticia para ela ser listada
Route::post('/noticias/atualizar/{idNoticia}', [App\Http\Controllers\controllerNoticias::class, 'update']); // Rota para editar
Route::get('/noticias/editar/{idNoticia}', [App\Http\Controllers\controllerNoticias::class, 'edit']); // Rota que manda o dado a ser editado para o formulário
Route::get('/noticias/apagar/{idNoticia}', [App\Http\Controllers\controllerNoticias::class, 'destroy']); // Rota para apagar


////////////////////////////////////////////////
/*Rotas do controller da tabela de Alunos*/
////////////////////////////////////////////////
Route::get ('/alunos/adicionarAluno/{idAluno}/{idTreino}', [App\Http\Controllers\controllerAluno::class, 'adicionaAlunoTime']); // Rota para exibir


//////////////////////////////////////////////////////////
/*Rotas do controller do Cronograma*/
//////////////////////////////////////////////////////////
Route::get ('/cronograma', [App\Http\Controllers\controllerCronograma::class, 'index']) ->name('indexCronograma');
Route::get ('/cronograma/gerarPDF', [App\Http\Controllers\controllerCronograma::class, 'gerarPDF']) ->name('gerarPDF');