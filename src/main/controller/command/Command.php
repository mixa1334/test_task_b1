<?php
require_once __DIR__ . "/../../exception/CommandException.php";
require_once __DIR__ . "/Router.php";

interface Command
{
    /**
     * @throws CommandException
     */
    public function execute(): Router;
}