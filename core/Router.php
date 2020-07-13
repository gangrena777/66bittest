<?php

namespace Core;


class Router 
{

	protected $routes = [
		'GET' => [],
		'POST' => []
	];

	public static function load($file) 
	{
		$router = new static(); // self
		//print_r($file);
			/*if (file_exists($file)) {
			    echo "The file $file exists";
			} else {
			    echo "The file $file does not exist";
			}*/

			//print_r($router)."no ";
		require "./".$file;
		//print_r($router)."VV ";
		return $router;
		//print_r($router)."no ";
	}

	public function get($uri, $controller) 
	{
		$this->routes['GET'][$uri] = $controller;
	}
	
	public function post($uri, $controller) 
	{
		$this->routes['POST'][$uri] = $controller;
	}

	public function direct($uri, $requestType)
	{
		if(array_key_exists($uri, $this->routes[$requestType]))
		{
			return $this->callAction(
				...explode('@', $this->routes[$requestType][$uri])
			);
		}

		throw new \Exception('No route defined for this uri.');
	}

	protected function callAction($controller, $action)
	{
		$controller = "App\\Controllers\\{$controller}";
		$Controller = new $controller;

		if (! method_exists($Controller, $action)) {
			throw new \Exception(
				"{$controller} does not respond to the {$action} action."
			);
		}

		return $Controller->$action();
	}
}