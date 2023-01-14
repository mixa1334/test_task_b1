<?php
require_once "command/Command.php";
require_once "command/CommandProvider.php";
require_once "Router.php";
require_once __DIR__ . "/../container/Container.php";

class Controller
{
    private Container $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }


    public function executeRequest(): void
    {
        $commandName = $_REQUEST['command'];
        if (is_string($commandName)) {
            $commandName = htmlspecialchars($commandName);
            $command = CommandProvider::provideCommand($commandName, $this->container);
            if (isset($command)) {
                try {
                    $router = $command->execute();
                    if ($router->hasError()) {
                        $code = $router->getErrorCode();
                        http_response_code($code);
                    } else {
                        $page = $router->getPath();
                        include_once $page;
                    }
                } catch (CommandException $e) {
                    //todo logger
                    http_response_code(500);
                }
            }
        } else {
            http_response_code(400);
        }
    }
}