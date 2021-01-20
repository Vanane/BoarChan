<form action="send" method="post">
    Your message : <input type="textarea" name="content" />
    <input type="submit" value="Submit" />
    <input type="text" name="thread" value="<?php echo $path[2]; ?>" hidden />
</form>