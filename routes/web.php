<?php

Route::get('/painel/produtos/tests', 'painel\ProdutoController@tests');

Route::resource('/painel/produtos', 'painel\ProdutoController');



