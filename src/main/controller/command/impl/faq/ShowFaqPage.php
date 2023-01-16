<?php
require_once __DIR__ . "/../../Command.php";

class ShowFaqPage implements Command
{
    public function execute(): Router
    {
        include_once __DIR__ . "/../../../../view/faq.php";
        return new Router(null);
    }
}