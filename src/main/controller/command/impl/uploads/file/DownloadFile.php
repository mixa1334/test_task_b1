<?php
require_once __DIR__ . "/../../../Command.php";

class DownloadFile implements Command
{
    private FileService $fileService;

    /**
     * @param FileService $fileService
     */
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }


    public function execute(): CommandRouter
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['file_name'])) {
            $fileName = htmlspecialchars($_GET['file_name']);
            $fullPath = $this->fileService->getFilePath($fileName);
            if (is_string($fullPath)) {
                header("Cache-Control: public");
                header("Content-Description: File Transfer");
                header("Content-Disposition: attachment; filename=$fileName");
                header("Content-Type: application/zip");
                header("Content-Transfer-Encoding: binary");
                readfile($fullPath);
            }
        }
        return new CommandRouter(null);
    }

}