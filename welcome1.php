<?php

session_start();

if (!isset($_SESSION["userid"]) || $_SESSION["userid"] !== true) {

    header("location: login.php");

    exit;

}

?>

<!DOCTYPE html>

<html lang="en">

    <head>


        <meta charset="UTF-8">

        <title>Welcome <?php echo $_SESSION["name"]; ?></title>

        
    </head>

    <body>


        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <h1>Hello, <strong><?php echo $_SESSION["name"]; ?></strong>. Welcome to my site.</h1>

        </div>

    </body>


</html>




