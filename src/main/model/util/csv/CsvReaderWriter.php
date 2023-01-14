<?php

interface CsvReaderWriter
{
    public function read(string $fileName): array;

    public function write(string $fileName, string $mode, array $data): bool;
}