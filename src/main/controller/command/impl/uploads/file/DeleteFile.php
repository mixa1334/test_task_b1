<?php
require_once __DIR__ . "/../../../Command.php";

class DeleteFile implements Command
{
    private FileService $fileService;

    /**
     * @param FileService $fileService
     */
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function execute(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['file_name'])) {
            $fileName = $_POST['file_name'];
            $result = $this->fileService->removeFile($fileName);
        }
    }

}