<?php
    $curtime = date('Y-m-d H:i:s');
    if($content != "") //If message isn't empty, then you can send
    {
        $result = pg_query($conn, "INSERT INTO message(content, threadid, stamp) VALUES ('$content', '$thread', '$curtime') RETURNING id;");
        $messageNum = pg_fetch_row($result)[0];
        pg_query($conn, "UPDATE thread SET lastMessage=$messageNum WHERE id=$thread;");
    }
?>