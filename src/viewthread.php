<?php
    echo "\n\nthread number : ".$path[2]."\n\n";
    $result = pg_query($conn, "SELECT * FROM message WHERE id=".$path[2].";");
    if(!$result)
        echo "There was an error.";
    else
    {
        while ($row = pg_fetch_row($result))
        {
            echo "<p>Message N°".$row[0]."</p>";
            echo "<p>".$row[1]."</p>";
        }
    }

?>

<form action="send" method="post">
    Your message : <input type="textarea" name="content" />
    <input type="submit" value="Submit" />
    <input type="text" name="thread" value="<?php echo $path[3]; ?>" hidden />
</form>