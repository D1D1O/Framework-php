<?php 

	#$route vetor de rotas , onde cada posição tera uma rota configurada pelo usuario do framework;
	#vetor de duas posições ; route[0]= rota ,,route[1]= controller e ação;

	$route[] = ['/'               ,  'HomeController@index'];  
	$route[] = ['/posts'          ,  'PostsController@index'];
	$route[] = ['/posts/{id}/show',  'PostsController@show'];


return $route;