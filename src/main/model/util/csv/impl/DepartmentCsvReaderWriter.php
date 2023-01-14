<?php
require_once __DIR__ . "/../../../entity/Department.php";
require_once "AbstractCsvReaderWriter.php";

class DepartmentCsvReaderWriter extends AbstractCsvReaderWriter
{
    const COLUMN_0_NAME = "XML_ID";

    const COLUMN_1_NAME = "PARENT_XML_ID";

    const COLUMN_2_NAME = "NAME_DEPARTMENT";

    protected function validateRow(array $row): bool
    {
        return count($row) === 3 && is_string($row[0]) && is_string($row[2])
            && $row[0] !== self::COLUMN_0_NAME && $row[1] !== self::COLUMN_1_NAME && $row[2] !== self::COLUMN_2_NAME;
    }

    protected function mapToEntity(array $row): Department
    {
        $department = new Department();
        $department->setXmlId($row[0]);
        $department->setParentXmlId($row[1]);
        $department->setNameDepartment($row[2]);
        return $department;
    }

    protected function getHeader(): array
    {
        return array(self::COLUMN_0_NAME, self::COLUMN_1_NAME, self::COLUMN_2_NAME);
    }

    protected function mapToRow($item): array
    {
        return array($item->getXmlId(), $item->getParentXmlId(), $item->getNameDepartment());
    }

}