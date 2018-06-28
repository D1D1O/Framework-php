<?php 

namespace App\Controllers;
use Core\BaseController;

class HomeController extends BaseController
{
	public function index()
	{
		//$this->view->nome = "Giovanny Lima";
		//$this->renderView('home/index');
		$this->exibir();
		
	}
}