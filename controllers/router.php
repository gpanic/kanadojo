<?php
    include_once SERVER_ROOT . '/controllers/home.php';
    include_once SERVER_ROOT . '/controllers/login.php';
    $whitelist = ['login', 'register', 'kana', 'ajax', ''];
    $blacklist = ['login', 'register'];

    session_start();

    function __autoload($className)
    {
        preg_match("/((?:^|[A-Z])[a-z]+)/", $className, $split);
        $fileName = $split[0];

        $file = SERVER_ROOT . '/models/' . strtolower($fileName) . '.php';

        if (file_exists($file))
        {
            include_once($file);
        }
        else
        {
            die("File '$fileName' containing class '$className' not found.");
        }
    }

    $request = $_SERVER['QUERY_STRING'];
    $parsed = explode('&', $request);
    $page = array_shift($parsed);
    $target = SERVER_ROOT . '/controllers/' . $page . '.php';

    $getVars = array();
    foreach ($parsed as $argument)
    {
        list($variable, $value) = explode('=', $argument);
        $getVars[$variable] = $value;
    }

    if (file_exists($target))
    {
        include_once($target);
        $class = ucfirst($page) . 'Controller';
        if (class_exists($class))
        {
            $controller = new $class;
        }
        else
        {
            die('Class does not exist!');
        }
    }
    else
    {
        // die('Page does not exist!');
        $controller = new HomeController;
    }
    if (!isset($_SESSION['id']))
    {
        if (in_array($page, $whitelist))
        {
            if ($_SERVER['REQUEST_METHOD'] === 'GET')
            {
                $controller->main($getVars);
            }
            else if ($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                $controller->post($_POST);
            }
        }
        else
        {
            $controller = new LoginController();
            $controller->main($getVars);
        }
    }
    else
    {
        if (in_array($page, $blacklist))
        {
            $controller = new HomeController();
            $controller->main($getVars);
        }
        else
        {
            if ($_SERVER['REQUEST_METHOD'] === 'GET')
            {
                $controller->main($getVars);
            }
            else if ($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                $controller->post($_POST);
            }
        }
    }
?>
