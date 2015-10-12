<?php
date_default_timezone_set('America/Sao_Paulo');

//define(TITULO, 'MAR');
//define(DESCRICAO, 'Aplicativo de exposicoes locais e virtuais.');
//define(TAGS, 'expor, mar');
//define(AUTOR, 'Emanoel Faria, Julien Leal e Vitor Martins');

//CONFIGURACOES DO BANCO
$host="localhost";
	$user = "root";
	$pass = "";
	$banco = "mar";
	$conexao = mysqli_connect($host,$user,$pass,$banco);
	
if (!$conexao) 
{
	die("Connection failed: " . mysqli_connect_error());
}
?>