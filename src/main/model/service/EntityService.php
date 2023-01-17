<?php
require_once __DIR__ . "/../../exception/ModelException.php";

/**
 * Сервис предоставляющий методы для работы с Entity классами.
 */
interface EntityService
{
    /**
     * Метод для получения массива всех сущностей
     * @return array
     * @throws ModelException
     */
    public function getAllEntities(): array;

    /**
     * Метод для загрузки сущностей в СУБД из файла
     * @param string $fileName
     * @return void
     * @throws ModelException
     */
    public function uploadEntitiesFromFile(string $fileName): void;

    /**
     * Метод для загрузки сущностей из СУБД в файл
     * @param string $fileName
     * @return void
     * @throws ModelException
     */
    public function downloadEntitiesAsFile(string $fileName): void;

    /**
     * Метод для удаления всех сущностей системы
     * @return void
     * @throws ModelException
     */
    public function removeAllEntities(): void;
}