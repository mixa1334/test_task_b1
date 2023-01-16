<?php
require_once __DIR__ . "/../../Command.php";

class UploadRecords implements Command
{
    private EntityService $entityService;
    private FileService $fileService;

    /**
     * @param EntityService $service
     * @param FileService $fileService
     */
    public function __construct(EntityService $service, FileService $fileService)
    {
        $this->entityService = $service;
        $this->fileService = $fileService;
    }


    public function execute(): CommandRouter
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_FILES && isset($_FILES['file'])) {
            try {
                $tmpFile = $_FILES['file']['tmp_name'];
                $baseName = basename($_FILES['file']['name']);
                $this->entityService->uploadEntitiesFromFile($tmpFile);
                $this->fileService->uploadFile($tmpFile, $baseName);
            } catch (ModelException $e) {
                throw new CommandException($e->getMessage());
            }
        }
        return new CommandRouter(CommandProvider::SHOW_RECORDS_PAGE->name);
    }

}