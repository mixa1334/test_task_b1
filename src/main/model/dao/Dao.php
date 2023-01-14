<?php

abstract class Dao
{
    protected ?PDO $pdo;

    abstract public function getAll(): array;

    abstract public function addAll(array $items): void;

    public function setPdo(?PDO $pdo): void
    {
        $this->pdo = $pdo;
    }
}