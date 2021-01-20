<?php
    if(!isset($_POST["name"]) || !isset($_POST["message"]))
    {
?>
            
<form action="new" method="POST">
    Title : <input type="text" name="name" placeholder="title"/>
    First message : <input type="textarea" name="message" placeholder="message"/>
    <input type="submit" value="Create"/>
</form>

<?php
    }
    else
    {
        $curtime = date('Y-m-d H:i:s');
        $result = pg_query($conn, "INSERT INTO thread (title) VALUES('".$_POST["name"]."') RETURNING id;");
        $row = pg_fetch_row($result);
        pg_query($conn, "INSERT INTO message (content, threadid, stamp) VALUES('".$_POST["message"]."', '$row[0]', '$curtime');");
        echo "<a href='thread/".$row[0]."'>thread created !</a>";
    }
?>