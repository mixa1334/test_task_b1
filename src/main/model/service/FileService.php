<?php

interface FileService
{
    function removeFile(string $fileName): void;

    function downloadFile(string $fileName): void;

    function uploadFile(string $fileName): void;

    function getAllFiles(): array;

    function getFileContentByName(string $name): array;
}