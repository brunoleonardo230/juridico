<?php

namespace App\Http\Controllers;

use App\Categoriaprocesso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class CategoriaProcessoController extends Controller {

   public function index() {

      $title = 'Categoria do Processo';

      $categoriaprocesso = Categoriaprocesso::orderBy('nome','asc')->get();

      return view('categoriaprocesso.index', compact('title', 'categoriaprocesso'));

   }

   public function create() {

      $title = 'Cadastrar Categoria do Processo';

      $url = '/categoriaprocesso/register';

      return view('categoriaprocesso.form', compact('title', 'url'));

   }
   public function save(Request $request) {

      $rules = [];

      $rules = [
         'nome'         => 'required'
      ];

      $nome = $request['nome'];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {

         return redirect()->action('CategoriaProcessoController@create')
            ->with('class', 'danger')
            ->with('msg', 'Erro ao tentar cadastrar Categoria do Processo, por favor atente para os erros listados abaixo:')
            ->withErrors($validator)
            ->withInput();

      } else {

         $unit = Categoriaprocesso::create($request->all());

         return redirect()->action('CategoriaProcessoController@index')
            ->with('class', 'success')
            ->with('msg', 'Cadastro de Categoria do Processo "'.$nome.'" realizado com sucesso!');

      }

   }

   public function delete($id) {

      $categoriaprocesso = Categoriaprocesso::find($id);

      $nome = $categoriaprocesso['nome'];

      $categoriaprocesso->delete();

      return redirect()->action('CategoriaProcessoController@index')
         ->with('class', 'success')
         ->with('msg', 'Categoria do Processo "'.$nome.'" excluida com sucesso!');

   }

   public function edit($id) {

      $title = 'Editar Categoria do Processo';

      $query = Categoriaprocesso::find($id);

      $url = '/categoriaprocesso/edit/';

      return view('categoriaprocesso.form', compact('title', 'query', 'url'));

   }

   public function update(Request $request) {

      
      $rules = [];
      $rules = [
         'nome'         => 'required'
      ];

      $categoriaprocesso = $request['nome'];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {

         return redirect()->action('CategoriaProcessoController@edit',['id'=>$request['id']])
            ->with('class', 'danger')
            ->with('msg', 'Erro ao tentar alterar o Categoria do Processo, por favor atente para os erros listados abaixo:')
            ->withErrors($validator)
            ->withInput();

      } else {

         $categoriaprocesso = Categoriaprocesso::find($request['id']);
         $categoriaprocesso->update($request->all());

         return redirect()->action('CategoriaProcessoController@index')
            ->with('class', 'success')
            ->with('msg', 'Categoria do Processo "'.$categoriaprocesso.'" alterado com sucesso!');

      }

   }

   

}
