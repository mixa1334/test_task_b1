<?php

interface FileService
{
    public function removeFile(string $fileName): bool;

    public function uploadFile(string $filePath, string $fileName): bool;

    public function getFilePath(string $fileName): ?string;

    public function getAllFiles(): array;

    public function getFileContentByName(string $fileName): array;
}