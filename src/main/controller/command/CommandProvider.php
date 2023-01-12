<?php
enum CommandProvider: string
{
    case TEST_COMMAND = "impl/TestCommand.php";

    /**
     * @throws CommandException
     */
    public static function provideCommand(string $commandName): Command
    {
        $commandName = strtoupper($commandName);
        foreach (self::cases() as $command) {
            if ($commandName === $command->name) {
                require_once $command->value;
                return $command->getCommand();
            }
        }
        throw new CommandException("$commandName is not a valid");
    }

    private function getCommand(): Command
    {
        return match ($this) {
            CommandProvider::TEST_COMMAND => new TestCommand()
        };
    }
}