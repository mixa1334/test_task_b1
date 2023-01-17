<?php
require_once __DIR__ . "/../../exception/CommandException.php";
require_once __DIR__ . "/CommandRouter.php";

/**
 * Взаимодействие с сервером сводиться к запрос на выолнения определенной команды.
 * Внутри метода execute() реализуется логика обработки запроса, вызовываются методы сервисных классов.
 */
interface Command
{
    /**
     * @throws CommandException
     */
    public function execute(): CommandRouter;
}