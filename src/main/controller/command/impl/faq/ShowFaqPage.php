<?php
require_once __DIR__ . "/../../Command.php";

class ShowFaqPage implements Command
{
    public function execute(): void
    {
        include_once __DIR__ . "/../../../../view/faq.php";
    }
}