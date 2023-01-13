<?php

interface DepartmentService
{
    function getAllDepartments(): array;

    function uploadDepartmentsFromFile(string $filePath): void;

    function downloadDepartmentsAsFile(): void;
}