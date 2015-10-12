<?php
 require_once "Conexoes/ConexaoComBancoDeDados.php";
 //require_once "Conexoes/ConexaoComBancoDeDadosLocal.php";
	
	$verification["id_usuario"]	= $_POST["id_usuario"];
	$verification["id_foto"]	= $_POST["id_foto"];
	$verification["id_nucleo"]	= $_POST["id_nucleo"];

	$queryStr = "SELECT id FROM NucleosVotados WHERE id_usuario=0 AND id_foto=0 AND id_nucleo=0";
	$yetVoteVerification = mysqli_query($conexao, $queryStr) or die (mysqli_error($conexao));

	if (mysqli_num_rows($yetVoteVerification) > 0) {
		echo GRAUBER;
	} else {
		echo BILUBILU;
		$votoNucleo = mysqli_query($conexao, "INSERT INTO NucleosVotados (id_usuario,id_foto,id_nucleo) VALUES (9, 9, 9)") or die (mysqli_error($conexao));
		echo("enviou");
	}	
?>