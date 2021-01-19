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
            {
                switch($path[2])
                {
                    case "send":
                        include("send.php");
                    break;
                    default:
                        include("src/viewthread.php");
                    break;
                }
            }
            else
                include("src/threadslist.php");
        break;
        case "send":
            include("src/send.php");
        default:
            include("src/404.php");
        break;
    }

?>