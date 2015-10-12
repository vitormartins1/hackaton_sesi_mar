<?php
 require_once "Conexoes/ConexaoComBancoDeDados.php";
 //require_once "Conexoes/ConexaoComBancoDeDadosLocal.php";
	
		$likes	= $_POST['likes'];
		$id		= $_POST['id'];

		$cadastro = mysqli_query($conexao, "UPDATE Fotos SET likes='$likes' WHERE id='$id'") or die (mysqli_error($conexao));

		echo("enviou");
?>