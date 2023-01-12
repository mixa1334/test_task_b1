<?php
namespace Controller\Command;

use CommandException;
use Controller\Router;

interface Command
{
    /**
     * @throws CommandException
     */
    public function execute(): Router;
}