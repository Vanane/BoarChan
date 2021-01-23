<?php
require("src/db.php");
require("src/config.php");
?>

<html>
    <head>
        <link rel="stylesheet" href="/src/css.css">
        <title>BoarChan - Like 4Chan, but not the same.</title>
    </head>
    <body>    
    <?php
        include("src/menu.php");
    ?>
    <div class="content">
    <?php
        include("src/controller.php");
    ?>
    </div>
    </body>
</html>