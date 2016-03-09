<?php

namespace SearchEngine\Config;


class Config {
	
	public static function get()
	{
		return [
			"DB" => [
				"host" => "localhost",
				"db" => "store",
				"username" => "root",
				"password" => "",
			],
			"Templates" => [
				"path" => __DIR__."/../View/Templates/",
			],
		];
	}
}
