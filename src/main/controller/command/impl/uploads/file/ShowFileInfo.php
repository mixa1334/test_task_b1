<?php
require_once __DIR__ . "/../../../Command.php";

class ShowFileInfo implements Command
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
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['file_name'])) {
            $fileName = $_GET['file_name'];
            $fileContent = $this->fileService->getFileContentByName($fileName);
            if (!empty($fileContent)) {
                include_once __DIR__ . "/../../../../../view/file_info.php";
            }
        }
    }

}