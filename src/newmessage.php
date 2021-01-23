<div class="newmessage">
    <form action="send" method="post">
        <p>Your message :</p>
        <textarea  name="content"></textarea>
        <input class="buttonlink" type="submit" value="Send" />
        <input type="text" name="thread" value="<?php echo $path[2]; ?>" hidden />
        <?php
          require_once('src/recaptcha/recaptchalib.php');
          $publickey = "6LcZZzkaAAAAAGXJqYPvTkh9kV8rIVB4WkuIun3Y";
          echo recaptcha_get_html($publickey);
        ?>
    </form>
</div>