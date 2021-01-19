<?php

    $threadrows = pg_query($conn, "SELECT * FROM thread;");
    if(!$threadrows)
        echo "There was a problem.";
    else
    {
        while($row = pg_fetch_row($threadrows))
        {
            $threadNum = $row[0];
            $threadTitle = $row[1];
            include("src/threadrow.php");
        }
    }

?>