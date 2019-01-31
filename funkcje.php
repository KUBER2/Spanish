<?php

function getConfig ($logType){
	if($logType=='normal'){
		require_once 'configNormal.php';
		print_r($config);
	}elseif ($logType=='super'){
		require_once 'config.php';
		print_r($config);
	}else{
		echo 'Niepoprawny atrybut!';
	}
	
}