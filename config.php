<?php
    require_once SERVER_ROOT . '/libs/meekrodb.2.1.class.php';
    DB::$user = 'root';
    DB::$password = '';
    DB::$dbName = 'kanadojo';
    DB::$error_handler = false;
    DB::$throw_exception_on_error = true;
?>