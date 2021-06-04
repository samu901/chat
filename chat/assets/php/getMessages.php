<?php
    $connection = mysqli_connect("brfplupul7ratoztqfni-mysql.services.clever-cloud.com","uvbn4ky4vwqcho8p","j1gNhlfKQ8jf243sHtL5");
    $db = mysqli_select_db($connection,"brfplupul7ratoztqfni");
    if(!$connection || !$db){
        echo "Errore di connessione";
    }

    $rs = mysqli_query($connection, "SELECT * FROM Messages");
    
    while($result = mysqli_fetch_assoc($rs)){
        echo "<div class='message'><p>".$result["Text"]."</p></div>";
    }
    mysqli_close($connection);
?>