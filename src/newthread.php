<?php
    if(!isset($_POST["name"]))
    {
?>
            
<form action="new.php" method="POST">
    Title : <input type="text" name="name" placeholder="title"/>
    <input type="submit" value="Create"/>
</form>

<?php
    }
    else
    {
        pg_query($conn, "INSERT INTO thread (title) VALUES(".$_GET["name"].");");
        $result = pg_query($conn, "SELECT * FROM thread WHERE id=MAX(id) LIMIT 1;");
        $row = pg_fetch_row($result);
        echo "<a href='thread/".$row[0]."'>thread created !</a>";
    }
?>