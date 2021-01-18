<?php
    if(isset($_POST["content"]) && isset($_POST["thread"]))
    {
        $thread = $_POST["thread"];
        $content = $_POST["content"];
        pg_query($conn, "INSERT INTO message(content, threadid) VALUES ('.$content.', '$thread');");
    }
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $thread = isset($_POST["thread"]) ? "/".$_POST["thread"] : "";
    header("Location: $host$uri/thread$thread");
?>