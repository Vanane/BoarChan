<?php
    $threadrow = pg_query($conn, "SELECT title FROM thread WHERE id=".$path[2].";");
    $messagerows = pg_query($conn, "SELECT id, content, stamp FROM message WHERE threadid=".$path[2].";");
    if(!$messagerows || !$threadrow)
        echo "There was an error.";
    else
    {
        if(pg_num_rows($threadrow))
        {
            $row = pg_fetch_row($threadrow);
            $threadTitle = $row[0];
            $threadNum = $path[2];
            echo "<h1 class='threadname'>$threadTitle</h1>";
            echo "thread n°$threadNum";
            if(pg_num_rows($messagerows))
            {
                $first = true;
                while ($row = pg_fetch_row($messagerows))
                {
                    if(!$first)
                        include("src/rowseparator.php");
                    $first = false;
    
                    $messageNum = $row[0];
                    $messageContent = $row[1];
                    $messageDate = $row[2];
                    include("messagerow.php");
                }
                include("src/rowseparator.php");
                include("src/newmessage.php");
            }
        }
        else
        {
            echo "This thread doesn't exist yet.";
        }
    }
?>