<?php
    echo "\n\nthread number : ".$path[2]."\n\n";
    $result = pg_query($conn, "SELECT * FROM message WHERE threadid=".$path[2].";");
    if(!$result)
        echo "There was an error.";
    else
    {
        if(pg_num_rows($result))
        {

            while ($row = pg_fetch_row($result))
            {
                $messageNum = $row[0];
                $messageContent = $row[1];
                include("messagerow.php");
            }
            include("src/messageform.php");
        }
        else
        {
            echo "This thread doesn't exist yet.";
        }
    }
?>