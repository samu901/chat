<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat 5S1</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
    <link rel="stylesheet" href="assets/style/style.css" type="text/css" />
</head>
<body>

    <?php
        $connection = mysqli_connect("brfplupul7ratoztqfni-mysql.services.clever-cloud.com","uvbn4ky4vwqcho8p","j1gNhlfKQ8jf243sHtL5");
        $db = mysqli_select_db($connection,"brfplupul7ratoztqfni");
        if(!$connection || !$db){
            echo "Errore di connessione";
            exit();
        }
    ?>


    <div id="messages">
    </div>
    <div id="send">
        <input type="text" id="txt_message" placeholder="Inserisci messaggio">
        <input type="submit" id="btnSend" value="Invia">
    </div>

    <script>
        const txtMessage = document.getElementById('txt_message');
        const btnSend = document.getElementById('btnSend');
        const message = document.getElementById('messages');

        function request(value){
            $.ajax({
                url: "assets/php/sendMessage.php",
                type: "post",
                data: value,
                success: function (response) {
                    console.log(response);
                }
            })
        }

        setInterval(() => {
            $.ajax({
                url: "assets/php/getMessages.php",
                type: "post",
                data: "",
                success: function (response) {
                    messages.innerHTML = response;
                    messages.scrollTop = messages.scrollHieght;
                }
            })
           
        },1000)

        btnSend.addEventListener('click', () => {
            if(txtMessage.value.length > 0){
                request({"message": txtMessage.value});
                const box = document.createElement('div');
                box.className="message me";
                const p = document.createElement('p');
                p.textContent = txtMessage.value;
                box.appendChild(p);
                messages.appendChild(box);
            }
        })
    </script>
</body>
</html>
