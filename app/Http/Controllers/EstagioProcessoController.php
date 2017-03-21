<?php

namespace App\Http\Controllers;

use App\Estagioprocesso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class EstagioProcessoController extends Controller {

   public function index() {

      $title = 'Estágio do Processo';

      $estagioprocesso = Estagioprocesso::orderBy('nome','asc')->get();

      return view('estagioprocesso.index', compact('title', 'estagioprocesso'));

   }

   public function search(Request $request) {

      $title = 'Estágio do Processo';

      $estagioprocesso = Estagioprocesso::where('nome', 'like', '%'.$request['search'].'%')
         ->paginate(15);

      return view('estagioprocesso.index', compact('title', 'estagioprocesso'));

   }

   public function create() {

      $title = 'Cadastrar Estágio do Processo';

      $url = '/estagioprocesso/register';

      return view('estagioprocesso.form', compact('title', 'url'));

   }
   public function save(Request $request) {

      $rules = [];

      $rules = [
         'nome'         => 'required'
      ];

      $nome = $request['nome'];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {

         return redirect()->action('EstagioProcessoController@create')
            ->with('class', 'danger')
            ->with('msg', 'Erro ao tentar cadastrar Estágio do Processo, por favor atente para os erros listados abaixo:')
            ->withErrors($validator)
            ->withInput();

      } else {

         $unit = Estagioprocesso::create($request->all());

         return redirect()->action('EstagioProcessoController@index')
            ->with('class', 'success')
            ->with('msg', 'Cadastro do Estágio do Processo "'.$nome.'" realizado com sucesso!');

      }

   }

   public function delete($id) {

      $estagioprocesso = Estagioprocesso::find($id);

      $nome = $estagioprocesso['nome'];

      $estagioprocesso->delete();

      return redirect()->action('EstagioProcessoController@index')
         ->with('class', 'success')
         ->with('msg', 'Estágio do Processo "'.$nome.'" excluido com sucesso!');

   }

   public function edit($id) {

      $title = 'Editar Estágio do Processo';

      $query = Estagioprocesso::find($id);

      $url = '/estagioprocesso/edit/';

      return view('estagioprocesso.form', compact('title', 'query', 'url'));

   }

   public function update(Request $request) {

      
      $rules = [];
      $rules = [
         'nome'         => 'required'
      ];

      $nome = $request['nome'];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {

         return redirect()->action('EstagioProcessoController@edit',['id'=>$request['id']])
            ->with('class', 'danger')
            ->with('msg', 'Erro ao tentar alterar o Estágio do Processo, por favor atente para os erros listados abaixo:')
            ->withErrors($validator)
            ->withInput();

      } else {

         $estagioprocesso = Estagioprocesso::find($request['id']);
         $estagioprocesso->update($request->all());

         return redirect()->action('EstagioProcessoController@index')
            ->with('class', 'success')
            ->with('msg', 'Estágio do Processo "'.$nome.'" alterado com sucesso!');

      }

   }

   

}
