<?php

/**
 * Интерфейс для создания объектов системы и разрешения зависимовстей.
 */
interface Container
{
    public function has(string $id): bool;

    public function get(string $id): mixed;
}
