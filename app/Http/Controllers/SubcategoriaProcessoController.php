<?php

namespace App\Http\Controllers;

use App\Categoriaprocesso;
use App\Subcategoriaprocesso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class SubcategoriaProcessoController extends Controller {

   public function index() {

      $title = 'Subcategoria Processo';

      $subcategoriaprocesso = Subcategoriaprocesso::select('subcategoriaprocesso.id','subcategoriaprocesso.nome','categoriaprocesso.nome as categoria')
                     ->join('categoriaprocesso', 'subcategoriaprocesso.idcategoriaprocesso','=','categoriaprocesso.id')->get();

      return view('subcategoriaprocesso.index', compact('title', 'subcategoriaprocesso'));

   }

   public function search(Request $request) {

      $title = 'Subcategoria Processo';

      $subcategoriaprocesso = Subcategoriaprocesso::select('subcategoriaprocesso.id','subcategoriaprocesso.nome','categoriaprocesso.nome as categoria')
                     ->join('categoriaprocesso', 'subcategoriaprocesso.idcategoriaprocesso','=','categoriaprocesso.id')
         ->where('subcategoriaprocesso.nome', 'like', '%'.$request['search'].'%')
         ->orWhere('categoriaprocesso.nome', 'like', '%'.$request['search'].'%')
         ->paginate(15);

      return view('subcategoriaprocesso.index', compact('title', 'subcategoriaprocesso'));

   }

   public function create() {

      $title = 'Cadastrar Subcategoria Processo';

      $categoriaprocesso = Categoriaprocesso::orderBy('nome', 'asc')->get();

      $url = '/subcategoriaprocesso/register';

      return view('subcategoriaprocesso.form', compact('title', 'url', 'categoriaprocesso'));

   }
   public function save(Request $request) {

      $rules = [];

      $rules = [
         'nome'         => 'required',
         'idcategoriaprocesso'       	=> 'required'
      ];

      $nome = $request['nome'];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {

         return redirect()->action('SubcategoriaProcessoController@create')
            ->with('class', 'danger')
            ->with('msg', 'Erro ao tentar cadastrar Subcategoria Processo, por favor atente para os erros listados abaixo:')
            ->withErrors($validator)
            ->withInput();

      } else {

         $unit = Subcategoriaprocesso::create($request->all());

         return redirect()->action('SubcategoriaProcessoController@index')
            ->with('class', 'success')
            ->with('msg', 'Cadastro de Subcategoria Processo "'.$nome.'" realizado com sucesso!');

      }

   }

   public function delete($id) {

      $subcategoriaprocesso = Subcategoriaprocesso::find($id);

      $nome = $subcategoriaprocesso['nome'];

      $subcategoriaprocesso->delete();

      return redirect()->action('SubcategoriaProcessoController@index')
         ->with('class', 'success')
         ->with('msg', 'Subcategoria Processo "'.$nome.'" excluida com sucesso!');

   }

   public function edit($id) {

      $title = 'Editar Subcategoria Processo';

      $query = Subcategoriaprocesso::find($id);

      $categoriaprocesso = Categoriaprocesso::all();

      $url = '/subcategoriaprocesso/edit/';

      return view('subcategoriaprocesso.form', compact('title', 'query', 'url', 'categoriaprocesso'));

   }

   public function update(Request $request) {

      
      $rules = [];
      $rules = [
         'nome'         => 'required',
         'idcategoriaprocesso'        => 'required'
      ];

      $nome = $request['nome'];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {

         return redirect()->action('SubcategoriaProcessoController@edit',['id'=>$request['id']])
            ->with('class', 'danger')
            ->with('msg', 'Erro ao tentar alterar o Subcategoria Processo, por favor atente para os erros listados abaixo:')
            ->withErrors($validator)
            ->withInput();

      } else {

         $subcategoriaprocesso = Subcategoriaprocesso::find($request['id']);
         $subcategoriaprocesso->update($request->all());

         return redirect()->action('SubcategoriaProcessoController@index')
            ->with('class', 'success')
            ->with('msg', 'Subcategoria Processo "'.$nome.'" alterado com sucesso!');

      }

   }

   

}
