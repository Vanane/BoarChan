<?php
pg_query($conn, "DROP TABLE IF EXISTS message;");
pg_query($conn, "DROP TABLE IF EXISTS thread;");
pg_query($conn, "CREATE TABLE thread(id SERIAL PRIMARY KEY, title VARCHAR(128), lastMessage INT);");
pg_query($conn, "CREATE TABLE message(id SERIAL PRIMARY KEY, content VARCHAR(512), threadid INT, stamp TIMESTAMP, CONSTRAINT fk_message_thread FOREIGN KEY (threadid) REFERENCES thread(id));");
?>