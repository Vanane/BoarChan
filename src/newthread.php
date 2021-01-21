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
        $threadName = pg_escape_string($conn, htmlspecialchars($_POST["name"]));
        $result = pg_query($conn, "INSERT INTO thread (title) VALUES('".$threadName."') RETURNING id;");
        if($result)
        {
            $row = pg_fetch_row($result);            
            $content = pg_escape_string($conn, htmlspecialchars($_POST["message"]));
            $thread = $row[0];
            
            require("send.php");
            Location("/thread/$thread");
        }
        else
            echo "There was an error, please try again.";
    }
?>