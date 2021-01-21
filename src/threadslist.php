<?php

    $threadrows = pg_query($conn, "SELECT * FROM thread;");
    if(!$threadrows)
        echo "There was a problem.";
    else
    {
        $first = true;
        while($row = pg_fetch_row($threadrows))
        {
            if(!$first)
                include("src/rowseparator.php");
            $first = false;

            $threadLastMessage = $row[0];
            $messagerow = pg_fetch_row(pg_query($conn, "SELECT stamp FROM message WHERE threadid=$threadLastMessage;"));
            $threadDate = $messagerow[0];            
            $threadNum = $row[0];
            $threadTitle = $row[1];
            include("src/threadrow.php");
        }
    }

?>