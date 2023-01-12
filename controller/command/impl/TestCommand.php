<?php

namespace Controller\Command;

use CommandException;
use Controller\Router;

class TestCommand implements Command
{
    public function execute(): Router
    {
//        throw new CommandException("hello world");
        return new Router("test_view");
    }
}