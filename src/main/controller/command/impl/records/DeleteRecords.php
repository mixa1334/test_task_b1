<?php
require_once __DIR__ . "/../../Command.php";

class DeleteRecords implements Command
{
    private EntityService $entityService;

    /**
     * @param EntityService $entityService
     */
    public function __construct(EntityService $entityService)
    {
        $this->entityService = $entityService;
    }


    public function execute(): CommandRouter
    {
        try {
            $this->entityService->removeAllEntities();
            return new CommandRouter(CommandProvider::SHOW_RECORDS_PAGE->name);
        } catch (ModelException $e) {
            throw new CommandException($e->getMessage());
        }
    }

}