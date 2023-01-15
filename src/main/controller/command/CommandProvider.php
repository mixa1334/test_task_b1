<?php
require_once __DIR__."/impl/faq/ShowFaqPage.php";
require_once __DIR__."/impl/records/DownloadRecords.php";
require_once __DIR__."/impl/records/UploadRecords.php";
require_once __DIR__."/impl/records/ShowRecordsPage.php";
require_once __DIR__."/impl/uploads/file/DeleteFile.php";
require_once __DIR__."/impl/uploads/file/DownloadFile.php";
require_once __DIR__."/impl/uploads/file/ShowFileInfo.php";
require_once __DIR__."/impl/uploads/ShowUploadsPage.php";

enum CommandProvider
{

    //FAQ
    case SHOW_FAQ_PAGE;
    //RECORDS
    case DOWNLOAD_DEPARTMENTS;
    case UPLOAD_DEPARTMENTS;
    case DOWNLOAD_USERS;
    case UPLOAD_USERS;
    case SHOW_RECORDS_PAGE;
    //FILES
    case DELETE_FILE;
    case DOWNLOAD_FILE;
    case SHOW_FILE_INFO;
    case SHOW_UPLOADS_PAGE;

    public static function provideCommand(string $commandName, Container $container): ?Command
    {
        $commandName = strtoupper($commandName);
        foreach (self::cases() as $command) {
            if ($commandName === $command->name) {
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
            CommandProvider::DOWNLOAD_DEPARTMENTS => new DownloadRecords($container->get('DepartmentService'), $container->get('DepartmentCsvReaderWriter')),
            CommandProvider::UPLOAD_DEPARTMENTS => new UploadRecords($container->get('DepartmentService'), $container->get('FileService')),
            CommandProvider::DOWNLOAD_USERS => new DownloadRecords($container->get('UserService'), $container->get('UserCsvReaderWriter')),
            CommandProvider::UPLOAD_USERS => new UploadRecords($container->get('UserService'), $container->get('FileService')),
            CommandProvider::SHOW_RECORDS_PAGE => new ShowRecordsPage($container->get('DepartmentService'), $container->get('UserService')),
            CommandProvider::DELETE_FILE => new DeleteFile(),
            CommandProvider::DOWNLOAD_FILE => new DownloadFile(),
            CommandProvider::SHOW_FILE_INFO => new ShowFileInfo(),
            CommandProvider::SHOW_UPLOADS_PAGE => new ShowUploadsPage()
        };
    }
}