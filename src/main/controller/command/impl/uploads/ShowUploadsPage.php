<?php
require_once __DIR__ . "/../../Command.php";

class ShowUploadsPage implements Command
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
        $files = $this->fileService->getAllFiles();
        include_once __DIR__ . "/../../../../view/uploads.php";
    }

}