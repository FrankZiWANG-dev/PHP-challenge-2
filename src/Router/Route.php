<?php
	
	class Route
	{
		private $path;
		private $callable;
		private $matches = [];
		private $params = [];
		
		public function __construct($path, $callable) {
			$this->path = trim($path, '/');
			$this->callable = $callable;
		}
		
		// hans flux - chain arguments and methods
		// ?: => ignore the parenthesis  -we never put a parenthesis in url normally
		public function with($param, $regex) {
			$this->params[$param] = str_replace('(', '(?:',$regex) ;
			return $this;
		}
		
		public function match($url){
			$url = trim($url, '/');
			//$path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
			$path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->path);
			//var_dump($path);
			$regex = "#^$path$#i";
			if(!preg_match($regex, $url, $matches)) {
				return false;
			}
			array_shift($matches);
			//var_dump($matches);
			$this->matches = $matches;
			return true;
		}
		
		private function paramMatch($match) {
			if(isset($this->params[$match[1]])) {
				return '(' . $this->params[$match[1]] . ')';
			}
			
			return '([^/]+)';
			//var_dump($match);
			//'([^/]+)'
		}
		
		public function call() {
			if(is_string($this->callable)) {
				$params = explode('#', $this->callable); // first param = controller name
				$controller = "Controller"; //"controllers\\" .  //$params[0] . "Controller";
				$controller = new $controller();
				return call_user_func_array([$controller, $params[1]], $this->matches);
				//$action = $params[1];
				//return $controller->$action();
			} else {
				return call_user_func_array($this->callable, $this->matches);
			}
			
		}
		
		public function getUrl($params) {
			$path = $this->path; //example : "/post/:id"
			foreach ($params as $k => $v) {
				$path = str_replace(":$k", $v, $path);
			}
			return $path;
		}
		
	}