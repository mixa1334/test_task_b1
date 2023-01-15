<?php

enum CommandProvider: string
{

    //FAQ
    case SHOW_FAQ_PAGE = "impl/faq/ShowFaqPage.php";
    //RECORDS
    case DOWNLOAD_DEPARTMENTS = "impl/records/departments/DownloadRecords.php";
    case UPLOAD_DEPARTMENTS = "impl/records/departments/UploadRecords.php";
    case DOWNLOAD_USERS = "impl/records/users/DownloadRecords.php";
    case UPLOAD_USERS = "impl/records/users/UploadRecords.php";
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

//    todo move to container
    private function getCommand(Container $container): Command
    {
        return match ($this) {
            CommandProvider::SHOW_FAQ_PAGE => new ShowFaqPage(),
            CommandProvider::DOWNLOAD_DEPARTMENTS => new DownloadRecords(),
            CommandProvider::UPLOAD_DEPARTMENTS => new UploadRecords(),
            CommandProvider::DOWNLOAD_USERS => new DownloadRecords(),
            CommandProvider::UPLOAD_USERS => new UploadRecords(),
            CommandProvider::SHOW_RECORDS_PAGE => new ShowRecordsPage(),
            CommandProvider::DELETE_FILE => new DeleteFile(),
            CommandProvider::DOWNLOAD_FILE => new DownloadFile(),
            CommandProvider::SHOW_FILE_INFO => new ShowFileInfo(),
            CommandProvider::SHOW_UPLOADS_PAGE => new ShowUploadsPage()
        };
    }
}