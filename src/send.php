<?php
    if(isset($_POST["content"]) && isset($_POST["thread"]) && $content != "")
    {
        $thread = pg_escape_string($conn, $_POST["thread"]);
        $content = pg_escape_string($conn, htmlspecialchars($_POST["content"]));
        $curtime = date('Y-m-d H:i:s');
        $result = pg_query($conn, "INSERT INTO message(content, threadid, stamp) VALUES ('$content', '$thread', '$curtime') RETURNING id;");
        $messageNum = pg_fetch_row($result)[0];
        pg_query($conn, "UPDATE thread SET lastMessage=$messageNum WHERE id=$thread;");
    }
    $host = $_SERVER['HTTP_HOST'];
    $thread = isset($_POST["thread"]) ? "/".$_POST["thread"] : "";
    header("Location: /thread$thread");
?>