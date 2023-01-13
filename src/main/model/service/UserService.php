<?php

interface UserService
{
    function getAllUsers(): array;

    function uploadUsersFromFile(string $filePath): void;

    function downloadUsersAsFile(): void;
}