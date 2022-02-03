<?php


class Core 
{
	//Properti untuk Default URL
	protected $controller = 'Users';
	protected $method = 'index';
	protected $params = [];
	
	public function __construct()
	{
		$url = $this->getURL();

		//Cek Controller
		if (isset($url[0])) {
			if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) 
			{
				//set controller baru
				$this->controller = ucwords($url[0]);
				unset($url[0]);
			}
		}
		

		require_once '../app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;

		//Cek method
		if (isset($url[1])) 
		{
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		//Cek Parameter
		if (!empty($url)) 
		{
			$this->params = array_values($url);
		}

		//Memanggil Controller dan Method, lalu kirim parameters
		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	//Mengambil URL untuk Routing
	public function getURL()
	{
		if (isset($_GET['url'])) {
			//Menghilangkan slash di akhir url
			$url = rtrim($_GET['url'], '/');
			//menghilangkan karakter asing selain string/number
			$url = filter_var($url, FILTER_SANITIZE_URL);
			//Memisahkan string dengan slash
			$url = explode('/', $url);
			return $url;
		}
	}
}