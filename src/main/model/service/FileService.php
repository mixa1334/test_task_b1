<?php

interface FileService
{
    function removeFile(int $id): void;

    //todo (file var) + save all info as file
    function uploadFile($file): void;

    function getAllFiles(): array;
}