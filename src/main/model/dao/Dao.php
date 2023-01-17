<?php

/**
 * Класс для работы с базой данных
 */
abstract class Dao
{
    protected ?PDO $pdo;

    /**
     * Получение всех сущностей из БД
     * @return array
     */
    abstract public function getAll(): array;

    /**
     * Добавление массива сущностей в бд
     * @param array $items
     * @return void
     */
    abstract public function addAll(array $items): void;

    /**
     * Удаление всех сущностей из БД
     * @return void
     */
    abstract public function removeAll(): void;

    /**
     * @param PDO|null $pdo
     * @return void
     */
    public function setPdo(?PDO $pdo): void
    {
        $this->pdo = $pdo;
    }
}