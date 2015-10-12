<?php
    $target_dir = "Fotos/";
    
    if(!file_exists($target_dir))
    {
        mkdir($target_dir, 0777, true);
    }
    
    $target_dir = $target_dir . basename($_FILES["filefield"]["name"]);
    if(move_uploaded_file($_FILES["filefield"]["tmp_name"], $target_dir))
    {
        echo "success";
    } else{
        echo "failed";
    }
?>	