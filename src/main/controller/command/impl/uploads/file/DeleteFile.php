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

    public function execute(): CommandRouter
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['file_name'])) {
            $fileName = htmlspecialchars($_POST['file_name']);
            $result = $this->fileService->removeFile($fileName);
        }
        return new CommandRouter(CommandProvider::SHOW_UPLOADS_PAGE->name);
    }

}