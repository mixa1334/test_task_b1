<?php
require_once "Command.php";

enum CommandProvider: string
{
    //todo array of services

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

    /**
     * @throws CommandException
     */
    public static function provideCommand(string $commandName): Command
    {
        $commandName = strtoupper($commandName);
        foreach (self::cases() as $command) {
            if ($commandName === $command->name) {
                require_once $command->value;
                return $command->getCommand();
            }
        }
        throw new CommandException("command is not a valid: $commandName");
    }

    private function getCommand(): Command
    {
        return match ($this) {
            CommandProvider::SHOW_FAQ_PAGE => new ShowFaqPage(),
            CommandProvider::DOWNLOAD_DEPARTMENTS => new DownloadDepartments(),
            CommandProvider::UPLOAD_DEPARTMENTS => new UploadDepartments(),
            CommandProvider::DOWNLOAD_USERS => new DownloadUsers(),
            CommandProvider::UPLOAD_USERS => new UploadUsers(),
            CommandProvider::SHOW_RECORDS_PAGE => new ShowRecordsPage(),
            CommandProvider::DELETE_FILE => new DeleteFile(),
            CommandProvider::DOWNLOAD_FILE => new DownloadFile(),
            CommandProvider::SHOW_FILE_INFO => new ShowFileInfo(),
            CommandProvider::SHOW_UPLOADS_PAGE => new ShowUploadsPage()
        };
    }
}