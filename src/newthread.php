<?php
    if(!isset($_POST["name"]) ||  $_POST["name"] == "" || !isset($_POST["message"]) || $_POST["message"] == "")
    {
?>
           
<div class="newthread">
    <form action="new" method="POST">
        <p>Title :</p>
        <input type="text" name="name" placeholder="title" maxlength="128"/>
        <p>First message :</p>
        <textarea name="message" placeholder="message" maxlength="512"></textarea>
        <input class="buttonlink" type="submit" value="Create"/>
    </form>
</div>

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
            header("Location: /thread/$thread");
        }
        else
            echo "There was an error, please try again.";
    }
?>