<?php

require __DIR__.'/vendor/autoload.php';

$index = __DIR__."/public/index.php";

if(file_exists($index))
{
	return include $index;
}else{
	return die(exit("Index file does not exist in ${index}."));
}
