<?php
//Home routes
Route::get('/home', 'HomeController@index');

// Login routes
Route::get('/', 'LoginController@index');
Route::post('/login', 'LoginController@auth');
Route::get('/logout', 'LoginController@logout');
// User routes
Route::get('/user', 'UserController@index');
Route::get('/user/register', 'UserController@create');
Route::post('/user/register', 'UserController@save');
Route::get('/user/delete/{id}', 'UserController@delete');
Route::get('/user/edit/{id}', 'UserController@edit');
Route::post('/user/edit', 'UserController@update');
Route::get('/user/redefinirsenha/{id}', 'UserController@redefinirsenha');
// Password routes
Route::get('/password/{id}', 'PassController@index');
Route::post('/password/edit', 'PassController@update');

// Localização routes
Route::get('/localizacao', 'LocalizacaoController@index');
Route::get('/localizacao/register', 'LocalizacaoController@create');
Route::post('/localizacao/register', 'LocalizacaoController@save');
Route::get('/localizacao/delete/{id}', 'LocalizacaoController@delete');
Route::get('/localizacao/edit/{id}', 'LocalizacaoController@edit');
Route::post('/localizacao/edit', 'LocalizacaoController@update');
Route::post('/localizacao/search', 'LocalizacaoController@search');

// Categoria Processo routes
Route::get('/categoriaprocesso', 'CategoriaProcessoController@index');
Route::get('/categoriaprocesso/register', 'CategoriaProcessoController@create');
Route::post('/categoriaprocesso/register', 'CategoriaProcessoController@save');
Route::get('/categoriaprocesso/delete/{id}', 'CategoriaProcessoController@delete');
Route::get('/categoriaprocesso/edit/{id}', 'CategoriaProcessoController@edit');
Route::post('/categoriaprocesso/edit', 'CategoriaProcessoController@update');
Route::post('/categoriaprocesso/search', 'CategoriaProcessoController@search');

// Subcategoria Processo routes
Route::get('/subcategoriaprocesso', 'SubcategoriaProcessoController@index');
Route::get('/subcategoriaprocesso/register', 'SubcategoriaProcessoController@create');
Route::post('/subcategoriaprocesso/register', 'SubcategoriaProcessoController@save');
Route::get('/subcategoriaprocesso/delete/{id}', 'SubcategoriaProcessoController@delete');
Route::get('/subcategoriaprocesso/edit/{id}', 'SubcategoriaProcessoController@edit');
Route::post('/subcategoriaprocesso/edit', 'SubcategoriaProcessoController@update');
Route::post('/subcategoriaprocesso/search', 'SubcategoriaProcessoController@search');

// Categoria Tribunal (Juizo) routes
Route::get('/categoriatribunal', 'CategoriaTribunalController@index');
Route::get('/categoriatribunal/register', 'CategoriaTribunalController@create');
Route::post('/categoriatribunal/register', 'CategoriaTribunalController@save');
Route::get('/categoriatribunal/delete/{id}', 'CategoriaTribunalController@delete');
Route::get('/categoriatribunal/edit/{id}', 'CategoriaTribunalController@edit');
Route::post('/categoriatribunal/edit', 'CategoriaTribunalController@update');
Route::post('/categoriatribunal/search', 'CategoriaTribunalController@search');

// Estagio Processo routes
Route::get('/estagioprocesso', 'EstagioProcessoController@index');
Route::get('/estagioprocesso/register', 'EstagioProcessoController@create');
Route::post('/estagioprocesso/register', 'EstagioProcessoController@save');
Route::get('/estagioprocesso/delete/{id}', 'EstagioProcessoController@delete');
Route::get('/estagioprocesso/edit/{id}', 'EstagioProcessoController@edit');
Route::post('/estagioprocesso/edit', 'EstagioProcessoController@update');
Route::post('/estagioprocesso/search', 'EstagioProcessoController@search');


Route::get('laravel-version', function() {
    $laravel = app();
    return "Your Laravel version is ".$laravel::VERSION;
});