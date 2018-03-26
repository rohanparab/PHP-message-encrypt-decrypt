<?php
    use Defuse\Crypto\Crypto;
    use Defuse\Crypto\Key;

    require "vendor/autoload.php";
?>
<html>
    <head>
        <title>oneCrypt</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bs/bootstrap.min.css">
        <script src="bs/bootstrap.min.js"></script>
        <script src="bs/jquery.min.js"></script>
        <link rel="stylesheet" href="style/index.css">
    </head>
    <body>
    <center>
        <br>
        <h2>Decrypt messages</h2>
        <div class="card">
            <form action="decrypt.php" method="post">
                <p>Enter Password : </p>
                <input type="text" class="form-control" name="key">
                <br>
                <p>Enter message : </p>
                <textarea class="form-control" name="msg"></textarea>
                <br>
                <button type="submit" class="btn btn-success form-control" name="decrypt">Decrypt</button>
            </form>
        </div>
        
        <div class="card">
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    if(isset($_POST['decrypt'])){
                        $key = $_POST['key'];
                        $msg = $_POST['msg'];


                        try{
                            $decrypt = Crypto::decryptWithPassword($msg, $key);

                            echo "<p><b>Decrypted message : </b></p>";
                            echo "<textarea class='form-control'>$decrypt</textarea><br>";
                        }catch(Exception $e){
                            echo "Wrong Password";
                        }


                    }
                }

            ?>
        </div>
    </center>
    </body>
</html>