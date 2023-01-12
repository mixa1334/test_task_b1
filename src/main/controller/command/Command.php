<?php
interface Command
{
    /**
     * @throws CommandException
     */
    public function execute(): Router;
}