<?php
    include("src/obfuscation.php");
    $path = explode('/', $_SERVER["REQUEST_URI"]);
    if(isset($path[1]) and $path[1] != "")
    {
        switch($path[1])
        {
            case "flush":
                include("flush.php");
            case "home":
                include("src/home.php");
            break;
            case "new":
                include("src/newthread.php");
            break;
            case "about":
                include("src/about.php");
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
            case "send": // Only called when sending a message.
                include("src/send.php");
            default:
                include("src/404.php");
            break;
        }
    }
    else
    {
        include("src/home.php");
    }


?>