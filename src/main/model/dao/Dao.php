<?php

abstract class Dao
{
    protected ?PDO $pdo;

    abstract public function getAll(): array;

    abstract public function addAll(array $items): void;

    abstract public function removeAll(): void;

    public function setPdo(?PDO $pdo): void
    {
        $this->pdo = $pdo;
    }
}