<?php
require_once __DIR__ . "/../../Command.php";
require_once __DIR__ . "/../../../Router.php";

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


    public function execute(): Router
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_FILES) {
            try {
                $this->entityService->uploadEntitiesFromFile($_FILES['file']['tmp_name']);
                $this->fileService->uploadFile($_FILES['file']['tmp_name'], basename($_FILES['file']['name']));
            } catch (ModelException $e) {
                throw new CommandException($e->getMessage());
            }
        }
        return new Router(null);
    }

}