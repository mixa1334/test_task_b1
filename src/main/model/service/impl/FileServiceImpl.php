<?php
require_once __DIR__ . "/../FileService.php";
require_once __DIR__ . "/../../util/csv/CsvReaderWriter.php";

class FileServiceImpl implements FileService
{
    private const UPLOADS = __DIR__ . "/../../../../../uploads/";
    private CsvReaderWriter $csvReaderWriter;

    /**
     * @param CsvReaderWriter $csvReaderWriter
     */
    public function __construct(CsvReaderWriter $csvReaderWriter)
    {
        $this->csvReaderWriter = $csvReaderWriter;
    }

    public function removeFile(string $fileName): bool
    {
        $fullPath = $this->convertToFullPath($fileName);
        return file_exists($fullPath) && unlink($fullPath);
    }

    public function uploadFile(string $filePath, string $fileName): bool
    {
        $newFilePath = $this->convertToFullPath($fileName);
        return file_exists($filePath) && !file_exists($newFilePath) && move_uploaded_file($filePath, $newFilePath);
    }

    public function getFilePath(string $fileName): ?string
    {
        $fullPath = $this->convertToFullPath($fileName);
        return file_exists($fullPath) ? $fullPath : null;
    }

    public function getAllFiles(): array
    {
        return array_diff(scandir(self::UPLOADS), array('.', '..'));
    }

    public function getFileContentByName(string $fileName): array
    {
        $fullPath = $this->convertToFullPath($fileName);
        return $this->csvReaderWriter->read($fullPath);
    }

    private function convertToFullPath(string $fileName): string
    {
        return self::UPLOADS . $fileName;
    }

}