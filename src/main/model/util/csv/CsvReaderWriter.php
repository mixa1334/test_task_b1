<?php

/**
 * Интерфейс необходимый для взаимодействия с csv файлами
 */
interface CsvReaderWriter
{
    /**
     * Метод для чтения содержимого csv файла. Если содержимое невалидно, то вернеться пустой массив
     * @param string $fileName
     * @return array
     */
    public function read(string $fileName): array;

    /**
     * Метод для записи масива в csv файл. В случае ошибки вернет false
     * @param string $fileName
     * @param string $mode
     * @param array $data
     * @return bool
     */
    public function write(string $fileName, string $mode, array $data): bool;
}