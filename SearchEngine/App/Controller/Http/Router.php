<?php

namespace SearchEngine\Controller\Http;

use Exception;
use SearchEngine\Config\Config as Config;

class Router {
	private $request_method;
	private static $_instance;
	
	private function __construct()
	{
		return $this->request_method=$_SERVER['REQUEST_METHOD'];
	}
	
	private function __clone()
	{
		
	}
	
	private static function getInstance()
	{
		if((self::$_instance)==null)
		{
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
	private static function manipulate($request='',$response='')
	{
		$config = Config::get()['Templates'];
		$request_uri = $_SERVER['REQUEST_URI'];
		$request_uri = str_replace('/','',$request_uri);
		$request = str_replace('/','',$request);
				
		if(isset($request_uri) == isset($request))
		{
			if(file_exists($config['path']."${request}.blade.php"))
			{
				include_once $config['path']."${request}.blade.php";
				try{
					call_user_func($response);
				}catch(Exception $e){
					echo $e->getMessage();
				}
			}
		}
	}
	
	public static function auto()
	{
			
		switch(self::getInstance()->request_method)
		{
			case 'GET':
				return 'GET';
			break;
			case 'POST':
				return 'POST';
			break;
			case 'PUT':
				return  'PUT';
			break;
			case 'DELETE':
				return 'DELETE';
			break;
			case 'UPDATE':
				return 'UPDATE';
			break;															
			default: throw new Exception("500 Internal Server Error.");
		}
	}
	
	public static function get($request='',$response='')
	{
		if(self::auto()=='GET')
		{
			return self::manipulate($request,$response);
		}
	}
	
	public static function post($request='',$response='')
	{
		if(self::auto()=='POST')
		{
			return self::manipulate($request,$response);
		}
	}
	public static function put($request='',$response='')
	{
		if(self::auto()=='PUT')
		{
			return self::manipulate($request,$response);
		}
	}
	public static function delete($request='',$response='')
	{
		if(self::auto()=='DELETE')
		{
			return self::manipulate($request,$response);
		}
	}
	public static function update($request='',$response='')
	{
		if(self::auto()=='UPDATE')
		{
			return self::manipulate($request,$response);
		}
	}			
}
