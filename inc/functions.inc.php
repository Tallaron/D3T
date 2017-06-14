<?php

function shutdown() {
    $error = error_get_last();

//    echo '<pre>';
//    var_dump($error);
//    echo '</pre>';
    
    if(is_array($error)) {
        if($error['type'] === 1) {
            $_SESSION['error'] = ERROR_TIMEOUT;
            header('Location: '.BASE_DIR.'/error');
        }
    }

//    echo 'Shutdown()';
    
}
