<?php

    echo "\n\nthread number : ".$path[2]."\n\n";
    $result = pg_query($conn, "SELECT * FROM message WHERE id=".$path[2].";");
    if(!$result)
        echo "This thread doesn't exist...Yet !";
    else
    {
        while ($row = pg_fetch_row($result))
        {
            echo "<p>Message N°".$row[0]."</p>";
            echo "<p>".$row[1]."</p>";
        }
    }

?>