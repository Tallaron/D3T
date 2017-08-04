<?php

function shutdown() {

    if(DEBUG_MODE) {
        echo '<pre>';
        var_dump(error_get_last());
        echo '</pre>';
    } else {
        if(is_array(error_get_last()) && error_get_last() != null && !isset($_SESSION['error_redirect']) && !IS_API) {
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


function import_handle() {
    $e = error_get_last();
    if( is_array($e) &&
        $e != null &&
        $e['type'] == 1) {
       header('Location: '.BASE_DIR.'/import'); 
    }
}




function n($n) {
    return number_format($n,0,'.',',');
}
