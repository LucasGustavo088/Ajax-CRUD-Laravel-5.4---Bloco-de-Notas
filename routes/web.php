<?php

Route::get('/painel/produtos/tests', 'painel\ProdutoController@tests');

Route::resource('/painel/produtos', 'painel\ProdutoController');

//ajax 
Route::get('/list', 'ListController@index');
Route::post('/list', 'ListController@create');
Route::post('/delete', 'ListController@delete');
Route::post('/editar', 'ListController@update');

Route::get('/procurar', 'ListController@procurar');




