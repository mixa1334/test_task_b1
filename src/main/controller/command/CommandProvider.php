<?php
require_once "Command.php";
require_once __DIR__ . "/../../container/Container.php";

enum CommandProvider: string
{
    //FAQ
    case SHOW_FAQ_PAGE = "impl/faq/ShowFaqPage.php";
    //RECORDS
    case DOWNLOAD_DEPARTMENTS = "impl/records/departments/DownloadDepartments.php";
    case UPLOAD_DEPARTMENTS = "impl/records/departments/UploadDepartments.php";
    case DOWNLOAD_USERS = "impl/records/users/DownloadUsers.php";
    case UPLOAD_USERS = "impl/records/users/UploadUsers.php";
    case SHOW_RECORDS_PAGE = "impl/records/ShowRecordsPage.php";
    //FILES
    case DELETE_FILE = "impl/uploads/file/DeleteFile.php";
    case DOWNLOAD_FILE = "impl/uploads/file/DownloadFile.php";
    case SHOW_FILE_INFO = "impl/uploads/file/ShowFileInfo.php";
    case SHOW_UPLOADS_PAGE = "impl/uploads/ShowUploadsPage.php";

    public static function provideCommand(string $commandName, Container $container): ?Command
    {
        $commandName = strtoupper($commandName);
        foreach (self::cases() as $command) {
            if ($commandName === $command->name) {
                require_once $command->value;
                return $command->getCommand($container);
            }
        }
        return null;
    }

    private function getCommand(Container $container): Command
    {
        return match ($this) {
            CommandProvider::SHOW_FAQ_PAGE => $container->get("SHOW_FAQ_PAGE"),
            CommandProvider::DOWNLOAD_DEPARTMENTS => $container->get("DOWNLOAD_DEPARTMENTS"),
            CommandProvider::UPLOAD_DEPARTMENTS => $container->get("UPLOAD_DEPARTMENTS"),
            CommandProvider::DOWNLOAD_USERS => $container->get("DOWNLOAD_USERS"),
            CommandProvider::UPLOAD_USERS => $container->get("UPLOAD_USERS"),
            CommandProvider::SHOW_RECORDS_PAGE => $container->get("SHOW_RECORDS_PAGE"),
            CommandProvider::DELETE_FILE => $container->get("DELETE_FILE"),
            CommandProvider::DOWNLOAD_FILE => $container->get("DOWNLOAD_FILE"),
            CommandProvider::SHOW_FILE_INFO => $container->get("SHOW_FILE_INFO"),
            CommandProvider::SHOW_UPLOADS_PAGE => $container->get("SHOW_UPLOADS_PAGE")
        };
    }
}