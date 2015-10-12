<?php
	require_once "Conexoes/ConexaoComBancoDeDados.php";

	$obra = 88;

	//passar o id da obra atual
	$queryStr = "SELECT id_nucleo FROM NucleosVotados WHERE id_foto='$obra'";
	$moreVoteds = mysqli_query($conexao, $queryStr) or die (mysqli_error($conexao));

	if (mysqli_num_rows($moreVoteds) > 0) {
		echo 'e isso ai';
		while ($row = mysqli_fetch_array($moreVoteds, MYSQL_NUM))
        {
        	echo $row;
        }
	} else {
		echo BILUBILU;
		//$votoNucleo = mysqli_query($conexao, "INSERT INTO NucleosVotados (id_usuario,id_foto,id_nucleo) VALUES (9, 9, 9)") or die (mysqli_error($conexao));
		echo("enviou");
	}
?>