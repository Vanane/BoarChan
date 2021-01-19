<?php

    $threadrows = pg_query($conn, "SELECT * FROM thread;");
    if(!$threadrows)
        echo "There was a problem.";
    else
    {
        while($row = pg_fetch_row($threadrows))
        {
            $threadLastMessage = $row[2];
            $messagerow = pg_fetch_row(pg_query($conn, "SELECT stamp FROM message WHERE threadid=$threadLastMessage;"));
            $threadDate = $messagerow[0];            
            $threadNum = $row[0];
            $threadTitle = $row[1];
            include("src/threadrow.php");
        }
    }

?>