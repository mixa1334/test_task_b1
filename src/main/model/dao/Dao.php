<?php

interface Dao
{
    function getAll(): array;

    function addAll(array $items): void;
}