<?php
require_once "AbstractCsvReaderWriter.php";

class PlainCsvReaderWriter extends AbstractCsvReaderWriter
{
    protected function validateRow(array $row): bool
    {
        return true;
    }

    protected function mapToEntity(array $row): mixed
    {
        return $row;
    }

    protected function getHeader(): array
    {
        return array();
    }

    protected function mapToRow($item): array
    {
        return $item;
    }

}