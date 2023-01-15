<?php
require_once __DIR__ . "/src/main/controller/Controller.php";
require_once __DIR__ . "/src/main/container/impl/ContainerImpl.php";

$container = new ContainerImpl();
$controller = new Controller($container);
$controller->executeRequest();