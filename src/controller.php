<?php

    $path = explode('/', $_SERVER["REQUEST_URI"]);
    
    switch($path[1])
    {
        case "home":
        break;
        case "new":
        break;
        case "about":
        break;
        case "thread":
            if(isset($path[2]))
                include("src/viewthread.php");
        break;
    }

?>