<?php
require_once __DIR__ . "/../EntityService.php";
require_once __DIR__ . "/../../util/csv/CsvReaderWriter.php";
require_once __DIR__ . "/../../dao/Dao.php";
require_once __DIR__ . "/../../database/DBConnection.php";

class EntityServiceImpl implements EntityService
{
    private CsvReaderWriter $csvReaderWriter;
    private Dao $dao;
    private DBConnection $dbConnection;

    /**
     * @param CsvReaderWriter $csvReaderWriter
     * @param Dao $dao
     * @param DBConnection $dbConnection
     */
    public function __construct(CsvReaderWriter $csvReaderWriter, Dao $dao, DBConnection $dbConnection)
    {
        $this->csvReaderWriter = $csvReaderWriter;
        $this->dao = $dao;
        $this->dbConnection = $dbConnection;
    }

    public function getAllEntities(): array
    {
        $pdo = $this->dbConnection->getConnection();
        $this->dao->setPdo($pdo);
        try {
            return $this->dao->getAll();
        } catch (Exception $exception) {
            throw new ModelException("some error in dao: " . $exception->getMessage());
        } finally {
            $pdo = null;
            $this->dao->setPdo(null);
        }
    }

    public function uploadEntitiesFromFile(string $fileName): void
    {
        $departments = $this->csvReaderWriter->read($fileName);
        $pdo = $this->dbConnection->getConnection();
        $this->dao->setPdo($pdo);
        try {
            $pdo->beginTransaction();
            $this->dao->addAll($departments);
            $pdo->commit();
        } catch (Exception $exception) {
            $pdo->rollBack();
            throw new ModelException("some error in dao: " . $exception->getMessage());
        } finally {
            $pdo = null;
            $this->dao->setPdo(null);
        }
    }

    public function downloadEntitiesAsFile(string $fileName): void
    {
        $pdo = $this->dbConnection->getConnection();
        $this->dao->setPdo($pdo);
        try {
            $departments = $this->dao->getAll();
            $this->csvReaderWriter->write($fileName, "w", $departments);
        } catch (Exception $exception) {
            throw new ModelException("some error in dao: " . $exception->getMessage());
        } finally {
            $pdo = null;
            $this->dao->setPdo(null);
        }
    }

}