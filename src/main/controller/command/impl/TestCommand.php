<?php
class TestCommand implements Command
{
    public function execute(): Router
    {
//        throw new CommandException("hello world");
        return new Router("some view");
    }
}