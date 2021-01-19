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
                echo "<p>Message N°".$row[0]."</p>";
                echo "<p>".$row[1]."</p>";
            }
            include("src/messageform.php");
        }
        else
        {
            echo "This thread doesn't exist yet.";
        }
    }
?>