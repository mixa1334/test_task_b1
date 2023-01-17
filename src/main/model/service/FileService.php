<?php

/**
 * Сервис предоставляющий функционал для работы с файлами на сервере
 */
interface FileService
{
    /**
     * Удаление файла с сервера (папка uploads)
     * @param string $fileName
     * @return bool
     */
    public function removeFile(string $fileName): bool;

    /**
     * загрузка временного файла расопложенного по пути filePath
     * @param string $filePath
     * @param string $fileName
     * @return bool
     */
    public function uploadFile(string $filePath, string $fileName): bool;

    /**
     * возвращает полный путь к файлу по его имени, в противном случае вернут null
     * @param string $fileName
     * @return string|null
     */
    public function getFilePath(string $fileName): ?string;

    /**
     * Возвращает массив с именами всех загруженных файлов
     * @return array
     */
    public function getAllFiles(): array;

    /**
     * Возвращат содержимое файла по его имени
     * @param string $fileName
     * @return array
     */
    public function getFileContentByName(string $fileName): array;
}