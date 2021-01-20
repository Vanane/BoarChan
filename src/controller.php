<?php
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
                            if(isset($_POST["content"]) && isset($_POST["thread"]))
                            {
                                $thread = pg_escape_string($conn, $_POST["thread"]);
                                $content = pg_escape_string($conn, htmlspecialchars($_POST["content"]));                                                        
                                include("send.php");

                                $host = $_SERVER['HTTP_HOST'];
                                header("Location: /thread/$thread");                            
                            }
                            else
                            {
                                header("Location: /thread");                            
                            }
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