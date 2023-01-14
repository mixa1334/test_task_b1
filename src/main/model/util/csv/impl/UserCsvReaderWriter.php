<?php
require_once __DIR__ . "/../../../entity/User.php";
require_once "AbstractCsvReaderWriter.php";

class UserCsvReaderWriter extends AbstractCsvReaderWriter
{
    private const ROW_LENGTH = 11;
    private array $columnNames = array('XML_ID', 'LAST_NAME', 'NAME', 'SECOND_NAME'
    , 'DEPARTMENT', 'WORK_POSITION', 'EMAIL', 'MOBILE_PHONE', 'PHONE', 'LOGIN', 'PASSWORD');

    protected function validateRow(array $row): bool
    {
        return count($row) === $this::ROW_LENGTH && $this->notHeader($row) && $this->valuesAreValid($row);
    }

    private function notHeader(array $row): bool
    {
        for ($i = 0; $i < $this::ROW_LENGTH; $i++) {
            if ($row[$i] === $this->columnNames[$i]) {
                return false;
            }
        }
        return true;
    }

    private function valuesAreValid(array $row): bool
    {
        for ($i = 0; $i < $this::ROW_LENGTH; $i++) {
            if ($i !== 7 && $i !== 8 && !is_string($row[$i])) {
                return false;
            }
        }
        return true;
    }

    protected function mapToEntity(array $row): User
    {
        $user = new User();
        $user->setXmlId($row[0]);
        $user->setLastName($row[1]);
        $user->setName($row[2]);
        $user->setSecondName($row[3]);
        $user->setDepartment($row[4]);
        $user->setWorkPosition($row[5]);
        $user->setEmail($row[6]);
        $user->setMobilePhone($row[7]);
        $user->setPhone($row[8]);
        $user->setLogin($row[9]);
        $user->setPassword($row[10]);
        return $user;
    }

    protected function getHeader(): array
    {
        return $this->columnNames;
    }

    protected function mapToRow($item): array
    {
        return array(
            $item->getXmlId(),
            $item->getLastName(),
            $item->getName(),
            $item->getSecondName(),
            $item->getDepartment(),
            $item->getWorkPosition(),
            $item->getWorkPosition(),
            $item->getMobilePhone(),
            $item->getPhone(),
            $item->getLogin(),
            $item->getPassword()
        );
    }

}