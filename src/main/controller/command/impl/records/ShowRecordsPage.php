<?php
require_once __DIR__ . "/../../Command.php";
require_once __DIR__ . "/../../../Router.php";

$departments = array();
$users = array();

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

    public function execute(): Router
    {
        try {
            $GLOBALS['departments'] = $this->departmentsService->getAllEntities();
            $GLOBALS['users'] = $this->userService->getAllEntities();
        } catch (ModelException $e) {
            throw new CommandException($e->getMessage());
        }
        return new Router(__DIR__ . "/../../../../view/records.php");
    }
}