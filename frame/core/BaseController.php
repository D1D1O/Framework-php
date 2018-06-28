<?php

namespace Core;

abstract class BaseController
{

	private $view;
	private $viewPath;

	public function __costruct()
	{

		
	}

	public function exibir(){
		echo " ola eu estou funcionando : ";
		$this->view = new \stdClass(); 
		$this->view->nome = "Giovanny Lima";
		echo "oi". var_dump($this->view);
	}
	protected function renderView($viewPath)
	{
		$this->viewPath = $viewPath;
		$this->content();
	}
	protected function content()
	{
		if (file_exists(__DIR__ . "/../app/Views/{$this->viewPath}.phtml")) {
			require_once __DIR__ . "/../app/Views/{$this->viewPath}.phtml";

		}else{
			echo "Error: View path not found !!";
		}
	}




}