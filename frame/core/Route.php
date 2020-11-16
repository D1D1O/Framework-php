<?php

// responsavel por obter as rotas da nossa aplicação


namespace Core; 


class Route
{

	private $routes;

	public function __construct(array $routes)
	{
		$this->setRoutes($routes);
		$this->run();
	}


	/*esta função percorrera todo nosso vetor de rotas analizando somente a segunda parte do vetor, assim com ajuda de funçoes do php ira separa o nome do controller e o metodo que deve ser chamado , alem disso esse metodo ira armazenar essas informaçoes em um vetor  */

	private function setRoutes($routes) 
	{
		foreach ($routes as $route)
		{
			$explode = explode('@',$route[1]);
			$r = [$route[0] , $explode[0] , $explode[1] ];
			$newRoutes[] = $r;
		}
		$this->routes = $newRoutes; /* apartir desta declarção a variavel $routes passa a conter um vetor de tres posições: rota ; controler ; metodo*/
	}

	private function getRequest(){
		$obj = new \stdClass;
		foreach ($_GET as $key => $value) {
			$obj->get->$key = $value;
		}
		foreach ($_POST as $key => $value) {
			$obj->post->$key = $value;
		}
		return $obj;
	}

	private function getUrl()
	{
		return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
	}

	private function run()
	{
		$url = $this->getUrl();  # qui temos a rota que foi passado pelo usuario.
		$urlArray = explode('/', $url); # aqui estamos separando a url que recebemos no na variavel $url a cada "/" encontrada. e atribuindo a um vetor;

		
		foreach ($this->routes as $route) {
			$routeArray = explode('/',$route[0]);# aqui estamos separando a rota  a cada "/" encontrada. e atribuindo a um vetor;


			for ($i=0; $i < count($routeArray) ; $i++) # esta estrutura de repetição é responsavel por achar {} dentro da rota para obtermos o parametro que esta send o passado na rota;
			{

				if ((strpos($routeArray[$i], "{") !==false) && (count($urlArray)== count($routeArray))) #/posts/{id}/show
				{
					$routeArray[$i] = $urlArray[$i];
					$param[]= $urlArray[$i];
				}

				$route[0] = implode($routeArray, '/');
			}

			if ($url == $route[0]) 
			{
				$found      = true;
				$controller = $route[1];
				$action     = $route[2];
				break;
			}else{
				$found = false;
			}
		}


		if($found)
		{
			$controller = Container::newController($controller);
			switch (@count($param)) {
				case 1:
					$controller->$action($param[0], $this->getRequest());
					break;

				case 2:
					$controller->$action($param[0], $this->getRequest());
					break;
				case 2:
					$controller->$action($param[0],$param[1], $this->getRequest());
					break;
				case 3:
					$controller->$action($param[0],$param[1],$param[2], $this->getRequest());
					break;
				
				default:
					$controller->$action($this->getRequest());
					break;
			}
		}
		else{
			
			Container::pageNotFound();
		}
	} 

}