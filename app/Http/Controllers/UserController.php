<?php

namespace App\Http\Controllers;

use App\User;
use App\Nivelacesso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller {

   public function index() {

      $title = 'Usuários';

      $user = User::select('users.id as iduser','users.name','users.username','nivelacessos.nome')
                     ->join('nivelacessos', 'users.nivelacesso','=','nivelacessos.id')
                     ->get();

      return view('user.index', compact('title', 'user'));

   }

   public function create() {

      $title = 'Cadastrar Usuários';

      $niveluser = Nivelacesso::orderBy('nome', 'asc')->get();

      $url = '/user/register';

      return view('user.form', compact('title', 'url', 'niveluser'));

   }
   public function save(Request $request) {

      $rules = [];

      $rules = [
         'name'         => 'required',
         'email'       	=> 'required',
         'username'     => 'required',
         'nivelacesso'  => 'required'
      ];

      $request['password'] = md5($request['username'].'1234');

      $usuario = $request['name'];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {

         return redirect()->action('UserController@create')
            ->with('class', 'danger')
            ->with('msg', 'Erro ao tentar cadastrar o usuário, por favor atente para os erros listados abaixo:')
            ->withErrors($validator)
            ->withInput();

      } else {

         $unit = User::create($request->all());

         return redirect()->action('UserController@index')
            ->with('class', 'success')
            ->with('msg', 'Cadastro de Usuário "'.$usuario.'" realizado com sucesso!');

      }

   }

   public function delete($id) {

      $user = User::find($id);

      $usuario = $user['name'];

      $user->delete();

      return redirect()->action('UserController@index')
         ->with('class', 'success')
         ->with('msg', 'Usuário "'.$usuario.'" excluido com sucesso!');

   }

   public function edit($id) {

      $title = 'Editar Usuário';

      $query = User::find($id);

      $niveluser = Nivelacesso::all();

      $url = '/user/edit/';

      return view('user.form', compact('title', 'query', 'url', 'niveluser'));

   }

   public function update(Request $request) {

      
      $rules = [];

      $rules = [
         'name'         => 'required',
         'email'          => 'required',
         'username'             => 'required',
         'nivelacesso'           => 'required'
      ];

      $usuario = $request['name'];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {

         return redirect()->action('UserController@edit',['id'=>$request['id']])
            ->with('class', 'danger')
            ->with('msg', 'Erro ao tentar alterar o Usuário, por favor atente para os erros listados abaixo:')
            ->withErrors($validator)
            ->withInput();

      } else {

         $user = User::find($request['id']);
         $user->update($request->all());

         return redirect()->action('UserController@index')
            ->with('class', 'success')
            ->with('msg', 'Usuário "'.$usuario.'" alterado com sucesso!');

      }

   }

   public function redefinirsenha($id){

      $user = User::find($id);
      $user->update(['password' => md5('admin1234')] );

      return redirect()->action('UserController@index')
         ->with('class', 'success')
         ->with('msg', 'Senha resetada com sucesso!');

   }

}
