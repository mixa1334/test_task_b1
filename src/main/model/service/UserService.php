<?php

interface UserService
{
    public function getAllUsers(): array;

    public function uploadUsersFromFile(string $filePath): void;

    public function downloadUsersAsFile(): void;
}