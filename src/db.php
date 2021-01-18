<?php
include("libpq");

$conn = pg_connect(getenv("DATABASE_URL"));

pg_query($conn, "create table message(id SERIAL content VARCHAR(512), thread INT);");
?>