<?php
    if(!isset($_POST["name"]))
    {
?>
            
<form action="new" method="POST">
    Title : <input type="text" name="name" placeholder="title"/>
    <input type="submit" value="Create"/>
</form>

<?php
    }
    else
    {
        $result = pg_query($conn, "INSERT INTO thread (`title`) VALUES(\"".$_POST["name"]."\") RETURNING id;");
        $row = pg_fetch_row($result);
        echo "<a href='thread/".$row[0]."'>thread created !</a>";
    }
?>