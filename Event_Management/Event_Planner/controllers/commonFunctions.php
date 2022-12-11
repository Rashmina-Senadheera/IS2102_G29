<?php

function showSessionMessage($error)
{
    if (isset($_SESSION[$error])) {
        $tempErr = $_SESSION[$error];
        unset($_SESSION[$error]);
        return $tempErr;
    }
}

// remove white spaces and unwanted special characters
function chekcInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
