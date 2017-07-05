<?php

function shutdown() {

    if(DEBUG_MODE) {
        echo '<pre>';
        var_dump(error_get_last());
        echo '</pre>';
    } else {
        if(is_array(error_get_last()) && error_get_last() != null && !isset($_SESSION['error_redirect'])) {
            $_SESSION['error_redirect'] = true;
            if($error['type'] === 1) {
                $_SESSION['error'] = ERROR_TIMEOUT;
                header('Location: '.BASE_DIR.'/error');
            } else {
                $_SESSION['error'] = ERROR_UNKNOWN;
                header('Location: '.BASE_DIR.'/error');
            }
        } else {
            $_SESSION['error_redirect'] = false;
        }
    }

}

function n($n) {
    return number_format($n,0,'.',',');
}
