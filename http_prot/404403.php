<?php
    $arr = ['a', 'b', 'c'];
    
    if (isset($_GET['key'])) {
        $key = $_GET['key'];
        
        if (isset($arr[$key])) {
            echo $arr[$key];
        } else {
            // отдать 404
            http_response_code(404);
            echo 'Not Found';
        }
    } else {
        // отдать 403
        http_response_code(403);
        echo 'Forbidden';
    }
?>