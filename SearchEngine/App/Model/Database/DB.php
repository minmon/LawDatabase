<?php

namespace SearchEngine\Model\Database;

use PDO;
use PDOException;
use SearchEngine\Config\Config as Config;

class DB {
	public static $_connection;
	private static $_instance;
	
	protected function __construct()
	{
		self::getConnection();
	}
	protected function __clone()
	{
		
	}
	public static function getInstance()
	{
		if((self::$_instance instanceof DB) == null)
		{
			self::$_instance = new self();
		}
		
		return self::$_instance;
	}
	public function getConnection()
	{
		$config = Config::get()['DB'];
		try{
			self::$_connection = new PDO("mysql:host=".$config['host'].";db=".$config['db'],$config['username'],$config['password']);
			return self::$_connection;
		}catch(PDOException $e)
		{
			trigger_error("Cannot connect to database ".$e->getMessage(),E_USER_ERROR);
		}
	}
}
