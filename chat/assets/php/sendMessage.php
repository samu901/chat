<?php
    $connection = mysqli_connect("brfplupul7ratoztqfni-mysql.services.clever-cloud.com","uvbn4ky4vwqcho8p","j1gNhlfKQ8jf243sHtL5");
    $db = mysqli_select_db($connection,"brfplupul7ratoztqfni");
    if(!$connection || !$db){
        echo "Errore di connessione";
    }
    
    $message = $_POST["message"];
    $id = uniqid();
    $rs = mysqli_query($connection,"INSERT INTO Messages (Text,ID) VALUES ('$message','$id')");
    mysqli_close($connection);
    echo $id;
?>