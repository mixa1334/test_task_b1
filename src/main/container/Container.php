<?php

interface Container
{
    public function has(string $id): bool;

    public function get(string $id): mixed;
}
