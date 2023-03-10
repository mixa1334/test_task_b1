<?php
require_once __DIR__ . "/impl/faq/ShowFaqPage.php";
require_once __DIR__ . "/impl/records/DeleteRecords.php";
require_once __DIR__ . "/impl/records/DownloadRecords.php";
require_once __DIR__ . "/impl/records/UploadRecords.php";
require_once __DIR__ . "/impl/records/ShowRecordsPage.php";
require_once __DIR__ . "/impl/uploads/file/DeleteFile.php";
require_once __DIR__ . "/impl/uploads/file/DownloadFile.php";
require_once __DIR__ . "/impl/uploads/file/ShowFileInfo.php";
require_once __DIR__ . "/impl/uploads/ShowUploadsPage.php";

enum CommandProvider
{

    //FAQ
    case SHOW_FAQ_PAGE;
    //RECORDS
    case DOWNLOAD_DEPARTMENTS;
    case UPLOAD_DEPARTMENTS;
    case DELETE_DEPARTMENTS;
    case DOWNLOAD_USERS;
    case UPLOAD_USERS;
    case DELETE_USERS;
    case SHOW_RECORDS_PAGE;
    //FILES
    case DELETE_FILE;
    case DOWNLOAD_FILE;
    case SHOW_FILE_INFO;
    case SHOW_UPLOADS_PAGE;

    /**
     * Метод для колучения команды по ключу.
     * @param string $commandName
     * @param Container $container
     * @return Command|null
     */
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

    private function getCommand(Container $container): Command
    {
        return match ($this) {
            CommandProvider::SHOW_FAQ_PAGE => new ShowFaqPage(),
            CommandProvider::DOWNLOAD_DEPARTMENTS => new DownloadRecords($container->get('DepartmentService'), $container->get('DepartmentCsvReaderWriter')),
            CommandProvider::UPLOAD_DEPARTMENTS => new UploadRecords($container->get('DepartmentService'), $container->get('FileService')),
            CommandProvider::DELETE_DEPARTMENTS => new DeleteRecords($container->get('DepartmentService')),
            CommandProvider::DOWNLOAD_USERS => new DownloadRecords($container->get('UserService'), $container->get('UserCsvReaderWriter')),
            CommandProvider::UPLOAD_USERS => new UploadRecords($container->get('UserService'), $container->get('FileService')),
            CommandProvider::DELETE_USERS => new DeleteRecords($container->get('UserService')),
            CommandProvider::SHOW_RECORDS_PAGE => new ShowRecordsPage($container->get('DepartmentService'), $container->get('UserService')),
            CommandProvider::DELETE_FILE => new DeleteFile($container->get('FileService')),
            CommandProvider::DOWNLOAD_FILE => new DownloadFile($container->get('FileService')),
            CommandProvider::SHOW_FILE_INFO => new ShowFileInfo($container->get('FileService')),
            CommandProvider::SHOW_UPLOADS_PAGE => new ShowUploadsPage($container->get('FileService'))
        };
    }
}