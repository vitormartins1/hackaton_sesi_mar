<?php
 require_once "Conexoes/ConexaoComBancoDeDados.php";
 //require_once "Conexoes/ConexaoComBancoDeDadosLocal.php";

$json = array();

$BuscaDoacoes = mysqli_query($conexao,"SELECT id,id_usuario,nome,likes,id_nucleo,descricao FROM Fotos");
echo mysqli_error($conexao);

if(mysqli_num_rows($BuscaDoacoes) > 0) 
	{
	   	while ($row = mysqli_fetch_array($BuscaDoacoes, MYSQL_NUM))
	   	{
	   			$consulta_likes = mysqli_query($conexao, "SELECT id FROM likes WHERE id_usuario='$row[1]' AND id_foto='$row[0]'") or die (mysql_error());
	   			$user_liked = (mysqli_num_rows($consulta_likes) == 0) ? '0' : '1';
   				$consulta_nucleo = mysqli_query($conexao, "SELECT nome FROM Nucleos WHERE id = '$row[4]'") or die(mysql_error());
   				
				$dadosNucleo;
   				while ($row2 = mysqli_fetch_array($consulta_nucleo, MYSQL_NUM)) {
   					$dadosNucleo['nucleo'] = $row2[0];
   					$dadosNucleo['cor_nucleo'] = $row2[1];
   				}

				$consulta_autor = mysqli_query($conexao, "SELECT usuario FROM Usuarios WHERE id = '$row[1]'") or die(mysql_error());
				$nomeAutor;
   				while ($row3 = mysqli_fetch_array($consulta_autor, MYSQL_NUM)) {
   					$nomeAutor = $row3[0];
   				}

				$arrayDeNotificacoes = array("id" => $row[0], 
					"id_usuario" => $row[1], 
					"nome" => $row[2],
					"likes" => $row[3],
					"id_nucleo" => $row[4],
					"descricao" => $row[5],
					"user_liked" => $user_liked,
					"nucleo" => $dadosNucleo['nucleo'],
					"autor" => $nomeAutor);

				array_push($json, $arrayDeNotificacoes);
		}
		echo json_encode($json, JSON_NUMERIC_CHECK);
	   }
if (mysqli_num_rows($BuscaDoacoes) == 0)
	{
		$answer = array("reason" => mysqli_error($conexao));
		echo json_encode($answer);
	}
mysqli_close($conexao);
?>