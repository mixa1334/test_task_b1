<?php
require_once __DIR__ . "/../../exception/CommandException.php";

interface Command
{
    /**
     * @throws CommandException
     */
    public function execute(): Router;
}