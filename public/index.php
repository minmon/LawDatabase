<?php

use SearchEngine\Controller\Http\Router as Router;
use SearchEngine\Model\Database\DB as DB;

Router::get('/welcome/');

Router::post('/welcome/',function(){
	echo "POST";
});
