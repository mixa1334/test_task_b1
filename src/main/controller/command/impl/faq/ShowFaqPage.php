<?php
require_once __DIR__ . "/../../Command.php";
require_once __DIR__ . "/../../../Router.php";

class ShowFaqPage implements Command
{
    public function execute(): Router
    {
        return new Router(__DIR__ . "/../../../../view/faq.php");
    }
}