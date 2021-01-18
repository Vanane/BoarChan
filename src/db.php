<?php
$conn = pg_connect(getenv("DATABASE_URL"));

pg_query($conn, "CREATE TABLE thread(id SERIAL, title VARCHAR(128));");
pg_query($conn, "CREATE TABLE message(id SERIAL, content VARCHAR(512), threadid INT, CONSTRAINT fk_message_thread FOREIGN KEY (threadid) REFERENCES thread(id));");
?>