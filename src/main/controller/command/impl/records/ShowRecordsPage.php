<?php
require_once __DIR__ . "/../../Command.php";

class ShowRecordsPage implements Command
{
    private EntityService $departmentsService;
    private EntityService $userService;

    /**
     * @param EntityService $departmentsService
     * @param EntityService $userService
     */
    public function __construct(EntityService $departmentsService, EntityService $userService)
    {
        $this->departmentsService = $departmentsService;
        $this->userService = $userService;
    }

    public function execute(): void
    {
        try {
            $departments = $this->departmentsService->getAllEntities();
            $users = $this->userService->getAllEntities();
            include_once __DIR__ . "/../../../../view/records.php";
        } catch (ModelException $e) {
            throw new CommandException($e->getMessage());
        }
    }
}