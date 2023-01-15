<?php
require_once __DIR__ . "/../../exception/ModelException.php";

interface EntityService
{
    /**
     * @throws ModelException
     */
    public function getAllEntities(): array;

    /**
     * @throws ModelException
     */
    public function uploadEntitiesFromFile(string $fileName): void;

    /**
     * @throws ModelException
     */
    public function downloadEntitiesAsFile(string $fileName): void;
}