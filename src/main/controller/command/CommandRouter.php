<?php

class CommandRouter
{
    private ?string $command;

    /**
     * @param string|null $command
     */
    public function __construct(?string $command)
    {
        $this->command = $command;
    }

    /**
     * @return string|null
     */
    public function getCommand(): ?string
    {
        return $this->command;
    }

    /**
     * @param string|null $command
     */
    public function setCommand(?string $command): void
    {
        $this->command = $command;
    }


}