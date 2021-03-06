<?php
    function cors() {
        header('Content-Type: application/json; charset=utf-8');
        if (isset($_SERVER['HTTP_ORIGIN'])) {

            header("Access-Control-Allow-Origin: *");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');    // cache for 1 day
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))

                header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, PATCH, HEAD");
            
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
                header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        
            exit(0);
        }
        
    }

    cors();
?>