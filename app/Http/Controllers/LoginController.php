<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   public function index() {

      $title = 'IDAC - JURIDICO';

      return view('login.login', compact('title'));
   }

   public function auth(Request $request) {

      $request = $request->all();
      $request['password'] = md5($request['password']);
      $user = User::auth($request['username'],$request['password']);

      if ($user) {
         $user = [
            'id' => $user->id,
            'name' => $user->name
         ];

         session()->put('user', $user);

         return redirect()->action('HomeController@index')
            ->with('msg', 'Login realizado com sucesso!');
      } else {
         return redirect()->action('LoginController@index')
            ->with('class', 'danger')
            ->with('msg', 'Login e/ou senha invalidos, por favor tente novamente!');
      }

   }

   public function logout(Request $request) {

      $request->session()->flush();
      
      return redirect()->action('LoginController@index')
      ->with('class', 'success')
      ->with('msg', 'Logout realizado com sucesso!');

   }
}
