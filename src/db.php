<?php
include("pg");

$conn = pg_connect(getenv("DATABASE_URL"));

?>