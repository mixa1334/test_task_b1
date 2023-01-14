<?php

interface FileService
{
    public function removeFile(string $fileName): void;

    public function downloadFile(string $fileName): void;

    public function uploadFile(string $fileName): void;

    public function getAllFiles(): array;

    public function getFileContentByName(string $name): array;
}