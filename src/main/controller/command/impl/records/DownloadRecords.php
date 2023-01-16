<?php
require_once __DIR__ . "/../../Command.php";

class DownloadRecords implements Command
{
    private EntityService $service;

    private CsvReaderWriter $csvReaderWriter;

    /**
     * @param EntityService $service
     * @param CsvReaderWriter $csvReaderWriter
     */
    public function __construct(EntityService $service, CsvReaderWriter $csvReaderWriter)
    {
        $this->service = $service;
        $this->csvReaderWriter = $csvReaderWriter;
    }

    public function execute(): CommandRouter
    {
        try {
            $items = $this->service->getAllEntities();
        } catch (ModelException $e) {
            throw new CommandException($e->getMessage());
        }

        $tempFile = tempnam(__DIR__ . "/../../../../../../temp/", "TMP0");
        rename($tempFile, $tempFile .= ".csv");

        $this->csvReaderWriter->write($tempFile, "w", $items);

        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=data.csv");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        readfile($tempFile);

        unlink($tempFile);

        return new CommandRouter(null);
    }

}