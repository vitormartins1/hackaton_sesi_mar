<?php
	date_default_timezone_set('America/Sao_Paulo');

	$host="mysql.hostinger.com.br";
	$user = "u485904443_user";
	$pass = "marotagem123";
	$banco = "u485904443_db";
	$conexao = mysqli_connect($host,$user,$pass,$banco); 
	
	if (!$conexao) 
	{
    	die("Connection failed: " . mysqli_connect_error());
	}
?>