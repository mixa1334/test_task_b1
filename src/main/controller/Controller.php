<?php
require_once "command/CommandProvider.php";

/**
 *Класс для обработки входящих запросов на сервер
 */
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
            $this->executeCommand($commandName);
        } else {
            include_once __DIR__ . "/../view/faq.php";
        }
    }

    private function executeCommand(string $commandName): void
    {
        $command = CommandProvider::provideCommand($commandName, $this->container);
        if (isset($command)) {
            try {
                $router = $command->execute();
                $forward = $router->getCommand();
                if (is_string($forward)) {
                    $this->executeCommand($forward);
                }
            } catch (CommandException $e) {
                http_response_code(500);
            }
        }
    }
}