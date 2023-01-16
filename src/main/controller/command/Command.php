<?php
require_once __DIR__ . "/../../exception/CommandException.php";
require_once __DIR__ . "/CommandRouter.php";

interface Command
{
    /**
     * @throws CommandException
     */
    public function execute(): CommandRouter;
}