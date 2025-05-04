<?php
session_start();

require_once 'config/Database.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$page = preg_replace('/[^a-zA-Z0-9]/', '', $page); // security

$controllerPath = 'controllers/' . ucfirst($page) . 'Controller.php';

if (file_exists($controllerPath)) {
    require_once $controllerPath;
    $controllerName = ucfirst($page) . 'Controller';
    $controller = new $controllerName();
    $controller->handleRequest();
} else {
    echo "404 - Page Not Found";
}
?>
