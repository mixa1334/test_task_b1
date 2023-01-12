<?php
class Router
{
    private string $path;

    private bool $hasError;

    private int $errorCode;

    public function __construct(string $path)
    {
        $this->path = $path;
        $this->hasError = false;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setErrorCode(int $errorCode): void
    {
        $this->errorCode = $errorCode;
        $this->hasError = true;
    }

    public function hasErrorCode(): bool
    {
        return $this->hasError;
    }

    public function getErrorCode(): int
    {
        return $this->errorCode;
    }
}