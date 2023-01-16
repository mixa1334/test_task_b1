<?php
require_once "command/CommandProvider.php";

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
                    $command->execute();
                } catch (CommandException $e) {
                    http_response_code(500);
                }
            }
        } else {
            include_once __DIR__ . "/../view/faq.php";
        }
    }
}