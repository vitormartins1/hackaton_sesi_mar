<?php
 require_once "Conexoes/ConexaoComBancoDeDados.php";
 
 $json = array();

if (mysqli_connect_errno())
{
	$answer = array("worked" => "no",  "reason" => mysqli_connect_error(), "data" => NULL);
    echo json_encode($answer);
}
 
$id_usuario = $_POST["idUser"];
$nome = $_POST["photoName"];
$nameNucleo = $_POST["photoNucleoName"];
$descricao = $_POST["photoDescription"];

$BuscaNucleo = mysqli_query($conexao,"SELECT id FROM Nucleos WHERE nome = '$nameNucleo'");

if(mysqli_num_rows($BuscaNucleo) > 0)
{
        while ($row = mysqli_fetch_array($BuscaNucleo, MYSQL_NUM))
        {
                  $resultNovaFoto = mysqli_query($conexao,"INSERT INTO Fotos (id_usuario,nome,id_nucleo,descricao) VALUES ('$id_usuario','$nome','$row[0]','$descricao')"); 
                  if($resultNovaFoto)
                    {
                        $SelectIdDoUltimoInsert = "SELECT max(LAST_INSERT_ID(id)) as id from Fotos";
                        $result = mysqli_query($conexao, $SelectIdDoUltimoInsert);

                        $row = mysqli_fetch_assoc($result);
                        $resultbenc =  json_encode($row);

                        if($result)
                        {
                            $answer = array("worked" => "yes", "reason" => "", "data" => $resultbenc);
                           echo json_encode($answer);
                        }
                        else{
                             $answer = array("worked" => "no", "reason" => mysqli_error($conexao), "data" => NULL);
                             echo json_encode($answer);
                             }
                    }else
                        {
                        $answer = array("worked" => "no", "reason" => mysqli_error($conexao), "data" => NULL);
                        echo json_encode($answer);
                        }
        }


}else
{
    $InsereNovoNucleo = mysqli_query($conexao, "INSERT INTO Nucleos (nome) VALUES ('$nameNucleo')");

    $SelectIdDoNucleoAdicionado =  mysqli_query($conexao,"SELECT max(LAST_INSERT_ID(id)) as id from Nucleos");
    while($row = mysqli_fetch_array($SelectIdDoNucleoAdicionado, MYSQL_NUM))
    {
            $InsereNovaFoto = "INSERT INTO Fotos (id_usuario,nome,id_nucleo,descricao) VALUES ('$id_usuario','$nome','$row[0]','$descricao')"; 

            $resultNovaFoto = mysqli_query($conexao, $InsereNovaFoto);

                    if($resultNovaFoto)
                    {
                        $SelectIdDoUltimoInsert = "SELECT max(LAST_INSERT_ID(id)) as id from Fotos";
                        $result = mysqli_query($conexao, $SelectIdDoUltimoInsert);

                        $row = mysqli_fetch_assoc($result);
                        $resultbenc =  json_encode($row);

                        if($result)
                        {
                            $answer = array("worked" => "yes", "reason" => "", "data" => $resultbenc);
                           echo json_encode($answer);
                        }
                        else{
                             $answer = array("worked" => "no", "reason" => mysqli_error($conexao), "data" => NULL);
                             echo json_encode($answer);
                             }
                    }else
                        {
                        $answer = array("worked" => "no", "reason" => mysqli_error($conexao), "data" => NULL);
                        echo json_encode($answer);
                        }
    }
}                
mysqli_close($conexao);
?>			