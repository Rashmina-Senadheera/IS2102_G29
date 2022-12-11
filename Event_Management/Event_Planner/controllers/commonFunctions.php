<?php

function showSessionMessage($error)
{
    if (isset($_SESSION[$error])) {
        $tempErr = $_SESSION[$error];
        unset($_SESSION[$error]);
        return $tempErr;
    }
}
?>