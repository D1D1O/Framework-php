<?php

namespace Core;
error_reporting(0);
ini_set(“display_errors”, 0 );


abstract class BaseController
{

	protected $view;
	private $viewPath;
	private $layoutPath;
	private $nomep = null;

	public function __costruct()
	{
		$this->view = new \stdClass;
		
	}


	protected function renderView($viewPath, $layoutPath = null)
	{
		$this->viewPath = $viewPath;
		$this->layoutPath = $layoutPath;
		if ($layoutPath) {
			$this->layout();
		}else{
			$this->content();
		}
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
		protected function layout()
	{
		if (file_exists(__DIR__ . "/../app/Views/{$this->layoutPath}.phtml")) {
			require_once __DIR__ . "/../app/Views/{$this->layoutPath}.phtml";

		}else{
			echo "Error: layout path not found !!";
		}
	}

	protected function pagett($titulo){
		$this->nomep = $titulo;
	}
	protected function getPageTitle($separator = null){
		if ($separator) {
			echo $this->nomep . " " . $separator . " ";
		}else{
			echo $this->nomep;
		}
	}



}