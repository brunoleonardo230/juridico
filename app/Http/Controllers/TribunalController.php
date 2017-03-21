<?php

namespace App\Http\Controllers;

use App\Localizacao;
use App\Categoriatribunal;
use App\Tribunal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class TribunalController extends Controller {

   public function index() {

      $title = 'Tribunal';

      $tribunal = Tribunal::select('tribunal.id','tribunal.nome', 'tribunal.descricao','localizacao.nome as localizacao', 'categoriatribunal.nome as categoriatribunal')
                     ->join('localizacao', 'tribunal.idlocalizacao','=','localizacao.id')
                     ->join('categoriatribunal', 'tribunal.idtribunalcategoria','=','categoriatribunal.id')
                     ->get();

      return view('tribunal.index', compact('title', 'tribunal'));

   }

   public function search(Request $request) {

      $title = 'Tribunal';

      $tribunal = Tribunal::select('tribunal.id','tribunal.nome', 'tribunal.descricao','localizacao.nome as localizacao', 'categoriatribunal.nome as categoriatribunal')
                     ->join('localizacao', 'tribunal.idlocalizacao','=','localizacao.id')
                     ->join('categoriatribunal', 'tribunal.idtribunalcategoria','=','categoriatribunal.id')
         ->where('tribunal.nome', 'like', '%'.$request['search'].'%')
         ->orWhere('categoriatribunal.nome', 'like', '%'.$request['search'].'%')
         ->orWhere('localizacao.nome', 'like', '%'.$request['search'].'%')
         ->paginate(15);

      return view('tribunal.index', compact('title', 'tribunal'));

   }

   public function create() {

      $title = 'Cadastrar Tribunal';

      $categoriatribunal = Categoriatribunal::orderBy('nome', 'asc')->get();

      $localizacao = Localizacao::orderBy('nome', 'asc')->get();

      $url = '/tribunal/register';

      return view('tribunal.form', compact('title', 'url', 'categoriatribunal', 'localizacao'));

   }
   public function save(Request $request) {

      $rules = [];

      $rules = [
         'nome'                  => 'required',
         'idlocalizacao'         => 'required',
         'idtribunalcategoria'   => 'required',
         'descricao'             => 'required'
      ];

      $nome = $request['nome'];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {

         return redirect()->action('TribunalController@create')
            ->with('class', 'danger')
            ->with('msg', 'Erro ao tentar cadastrar Tribunal, por favor atente para os erros listados abaixo:')
            ->withErrors($validator)
            ->withInput();

      } else {

         $unit = Tribunal::create($request->all());

         return redirect()->action('TribunalController@index')
            ->with('class', 'success')
            ->with('msg', 'Cadastro de Tribunal "'.$nome.'" realizado com sucesso!');

      }

   }

   public function delete($id) {

      $tribunal = Tribunal::find($id);

      $nome = $tribunal['nome'];

      $tribunal->delete();

      return redirect()->action('TribunalController@index')
         ->with('class', 'success')
         ->with('msg', 'Tribunal "'.$nome.'" excluida com sucesso!');

   }

   public function edit($id) {

      $title = 'Editar Tribunal';

      $query = Tribunal::find($id);

      $categoriatribunal = Categoriatribunal::all();

      $localizacao = Localizacao::all();

      $url = '/tribunal/edit/';

      return view('tribunal.form', compact('title', 'query', 'url', 'categoriatribunal', 'localizacao'));

   }

   public function update(Request $request) {

      
      $rules = [];
      $rules = [
         'nome'                  => 'required',
         'idlocalizacao'         => 'required',
         'idtribunalcategoria'   => 'required',
         'descricao'             => 'required'
      ];

      $nome = $request['nome'];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {

         return redirect()->action('TribunalController@edit',['id'=>$request['id']])
            ->with('class', 'danger')
            ->with('msg', 'Erro ao tentar alterar o Tribunal, por favor atente para os erros listados abaixo:')
            ->withErrors($validator)
            ->withInput();

      } else {

         $tribunal = Tribunal::find($request['id']);
         $tribunal->update($request->all());

         return redirect()->action('TribunalController@index')
            ->with('class', 'success')
            ->with('msg', 'Tribunal "'.$nome.'" alterado com sucesso!');

      }

   }

   

}
