<?php 

namespace App\Controllers;
use Core\BaseController;

class HomeController extends BaseController
{
	public function index()
	{
		$this->pagett(Home);
		$this->view->nome = "Gay";
		$this->renderView('home/index', 'layout');

		
		
	}
}