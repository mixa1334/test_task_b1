<?php
require_once __DIR__ . "/../CsvReaderWriter.php";

abstract class AbstractCsvReaderWriter implements CsvReaderWriter
{
    private string $separator = ";";

    public function read(string $fileName): array
    {
        $result = array();
        $file = fopen($fileName, 'r');
        if ($file === false) {
            return $result;
        }
        while (!feof($file)) {
            $row = fgetcsv($file, null, $this->separator);
            if (is_array($row) && $this->validateRow($row)) {
                $result[] = $this->mapToEntity($row);
            }
        }
        fclose($file);
        return $result;
    }

    abstract protected function validateRow(array $row): bool;

    abstract protected function mapToEntity(array $row): mixed;

    public function write(string $fileName, string $mode, array $data): bool
    {
        $file = fopen($fileName, $mode);
        if ($file === false) {
            return false;
        }
        $header = $this->getHeader();
        fputcsv($file, $header, $this->separator);
        foreach ($data as $item) {
            $row = $this->mapToRow($item);
            fputcsv($file, $row, $this->separator);
        }
        fclose($file);
        return true;
    }

    abstract protected function getHeader(): array;

    abstract protected function mapToRow($item): array;

    /**
     * @return string
     */
    public function getSeparator(): string
    {
        return $this->separator;
    }

    /**
     * @param string $separator
     */
    public function setSeparator(string $separator): void
    {
        $this->separator = $separator;
    }
}