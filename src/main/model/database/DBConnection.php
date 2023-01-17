<?php

/**
 * Интерфейс для получения коннекшена (один на запрос) к базе данных
 */
interface DBConnection
{
    /**
     * Получения экземпляра класса PDO для работы с БД
     * @return PDO
     */
    public function getConnection(): PDO;
}