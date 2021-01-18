<?php

    $path = explode('/', $_SERVER["REQUEST_URI"]);
    
    switch($path[1])
    {
        case "home":
        break;
        case "new":
            include("src/newthread.php");
        break;
        case "about":
        break;
        case "thread":
            if(isset($path[2]))
                include("src/viewthread.php");
        break;
        default:
            include("src/404.php");
        break;
    }

?>