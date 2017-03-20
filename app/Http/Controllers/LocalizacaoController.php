<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Localizacao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class LocalizacaoController extends Controller {

   public function index() {

      $title = 'Localização';

      $localizacao = Localizacao::select('localizacao.id','localizacao.nome','estados.descricao')
                     ->join('estados', 'localizacao.uf','=','estados.id')->get();

      return view('localizacao.index', compact('title', 'localizacao'));

   }

   public function create() {

      $title = 'Cadastrar Localização';

      $estados = Estado::orderBy('descricao', 'asc')->get();

      $url = '/localizacao/register';

      return view('localizacao.form', compact('title', 'url', 'estados'));

   }
   public function save(Request $request) {

      $rules = [];

      $rules = [
         'nome'         => 'required',
         'uf'       	=> 'required'
      ];

      $localizacao = $request['nome'];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {

         return redirect()->action('LocalizacaoController@create')
            ->with('class', 'danger')
            ->with('msg', 'Erro ao tentar cadastrar Localização, por favor atente para os erros listados abaixo:')
            ->withErrors($validator)
            ->withInput();

      } else {

         $unit = Localizacao::create($request->all());

         return redirect()->action('LocalizacaoController@index')
            ->with('class', 'success')
            ->with('msg', 'Cadastro de Localização "'.$localizacao.'" realizado com sucesso!');

      }

   }

   public function delete($id) {

      $localizacao = Localizacao::find($id);

      $nome = $localizacao['nome'];

      $localizacao->delete();

      return redirect()->action('LocalizacaoController@index')
         ->with('class', 'success')
         ->with('msg', 'Localização "'.$nome.'" excluida com sucesso!');

   }

   public function edit($id) {

      $title = 'Editar Localização';

      $query = Localizacao::find($id);

      $estados = Estado::all();

      $url = '/localizacao/edit/';

      return view('localizacao.form', compact('title', 'query', 'url', 'estados'));

   }

   public function update(Request $request) {

      
      $rules = [];
      $rules = [
         'nome'         => 'required',
         'uf'        => 'required'
      ];

      $localizacao = $request['nome'];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {

         return redirect()->action('LocalizacaoController@edit',['id'=>$request['id']])
            ->with('class', 'danger')
            ->with('msg', 'Erro ao tentar alterar o Localização, por favor atente para os erros listados abaixo:')
            ->withErrors($validator)
            ->withInput();

      } else {

         $localizacao = Localizacao::find($request['id']);
         $localizacao->update($request->all());

         return redirect()->action('LocalizacaoController@index')
            ->with('class', 'success')
            ->with('msg', 'Localização "'.$localizacao.'" alterado com sucesso!');

      }

   }

   

}
