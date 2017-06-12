<?php

function shutdown() {
    $error = error_get_last();
    
    if($error['type'] == 1) {
        $_SESSION['error'] = ERROR_TIMEOUT;
        header('Location: '.BASE_DIR.'/error');
    }
}
