<?php
    require_once('src/recaptcha/recaptchalib.php');
    $privatekey = "6LcZZzkaAAAAAN1w55J7QO4RdHYG1w52KBQXSccD";
    $resp = recaptcha_check_answer ($privatekey,
                                    $_SERVER["REMOTE_ADDR"],
                                    $_POST["recaptcha_challenge_field"],
                                    $_POST["recaptcha_response_field"]);
    if($resp->is_valid)
    {
        $curtime = date('Y-m-d H:i:s');
        if($content != "") //If message isn't empty, then you can send
        {
            $result = pg_query($conn, "INSERT INTO message(content, threadid, stamp) VALUES ('$content', '$thread', '$curtime') RETURNING id;");
            $messageNum = pg_fetch_row($result)[0];
            pg_query($conn, "UPDATE thread SET lastMessage=$messageNum WHERE id=$thread;");
        }
    }
    else
    {
        echo "There has been a problem with the captcha. Try again.";
    }
?>