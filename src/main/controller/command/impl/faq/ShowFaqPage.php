<?php
require_once __DIR__ . "/../../Command.php";

class ShowFaqPage implements Command
{
    public function execute(): CommandRouter
    {
        include_once __DIR__ . "/../../../../view/faq.php";
        return new CommandRouter(null);
    }
}