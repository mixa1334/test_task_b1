<?php

interface DepartmentService
{
    public function getAllDepartments(): array;

    public function uploadDepartmentsFromFile(string $filePath): void;

    public function downloadDepartmentsAsFile(): void;
}