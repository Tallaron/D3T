<?php

function shutdown() {

//    echo '<pre>';
//    var_dump(error_get_last());
//    echo '</pre>';
    
    if(is_array(error_get_last())) {
        if($error['type'] === 1) {
            $_SESSION['error'] = ERROR_TIMEOUT;
            header('Location: '.BASE_DIR.'/error');
        } else {
            $_SESSION['error'] = ERROR_UNKNOWN;
            header('Location: '.BASE_DIR.'/error');
        }
    }

//    echo 'Shutdown()';
    
}
