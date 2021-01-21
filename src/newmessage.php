<div class="newmessage">
    <form action="send" method="post">
        <p>Your message :</p>
        <textarea  name="content"></textarea>
        <input class="buttonlink" type="submit" value="Send" />
        <input type="text" name="thread" value="<?php echo $path[2]; ?>" hidden />
    </form>
</div>