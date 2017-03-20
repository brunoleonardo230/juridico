<?php

namespace App\Http\Controllers;

use App\Categoriatribunal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class CategoriaTribunalController extends Controller {

   public function index() {

      $title = 'Juízo';

      $categoriatribunal = Categoriatribunal::orderBy('nome','asc')->get();

      return view('categoriatribunal.index', compact('title', 'categoriatribunal'));

   }

   public function create() {

      $title = 'Cadastrar Juízo';

      $url = '/categoriatribunal/register';

      return view('categoriatribunal.form', compact('title', 'url'));

   }
   public function save(Request $request) {

      $rules = [];

      $rules = [
         'nome'         => 'required'
      ];

      $nome = $request['nome'];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {

         return redirect()->action('CategoriaTribunalController@create')
            ->with('class', 'danger')
            ->with('msg', 'Erro ao tentar cadastrar Juízo, por favor atente para os erros listados abaixo:')
            ->withErrors($validator)
            ->withInput();

      } else {

         $unit = Categoriatribunal::create($request->all());

         return redirect()->action('CategoriaTribunalController@index')
            ->with('class', 'success')
            ->with('msg', 'Cadastro de Juízo "'.$nome.'" realizado com sucesso!');

      }

   }

   public function delete($id) {

      $categoriatribunal = Categoriatribunal::find($id);

      $nome = $categoriatribunal['nome'];

      $categoriatribunal->delete();

      return redirect()->action('CategoriaTribunalController@index')
         ->with('class', 'success')
         ->with('msg', 'Juízo "'.$nome.'" excluida com sucesso!');

   }

   public function edit($id) {

      $title = 'Editar Juízo';

      $query = Categoriatribunal::find($id);

      $url = '/categoriatribunal/edit/';

      return view('categoriatribunal.form', compact('title', 'query', 'url'));

   }

   public function update(Request $request) {

      
      $rules = [];
      $rules = [
         'nome'         => 'required'
      ];

      $nome = $request['nome'];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {

         return redirect()->action('CategoriaTribunalController@edit',['id'=>$request['id']])
            ->with('class', 'danger')
            ->with('msg', 'Erro ao tentar alterar o Juízo, por favor atente para os erros listados abaixo:')
            ->withErrors($validator)
            ->withInput();

      } else {

         $categoriatribunal = Categoriatribunal::find($request['id']);
         $categoriatribunal->update($request->all());

         return redirect()->action('CategoriaTribunalController@index')
            ->with('class', 'success')
            ->with('msg', 'Juízo "'.$nome.'" alterado com sucesso!');

      }

   }

   

}
