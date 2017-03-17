<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
      $title = 'Início';

      return view('home', compact('title'));
   }
}
