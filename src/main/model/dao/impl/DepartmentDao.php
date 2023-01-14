<?php
require_once __DIR__ . "/../Dao.php";
require_once __DIR__ . "/../../entity/Department.php";

class DepartmentDao extends Dao
{
    private const SELECT_DEPARTMENTS = "SELECT xml_id AS xmlId,
       parent_xml_id AS parentXmlId, 
       name_department AS nameDepartment FROM departments";

    private const INSERT_DEPARTMENT = "INSERT INTO departments (
                         xml_id, 
                         parent_xml_id,
                         name_department
                         ) VALUES (?, ?, ?)";

    public function getAll(): array
    {
        $stmt = $this->pdo->prepare(self::SELECT_DEPARTMENTS);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Department::class);
    }

    public function addAll(array $items): void
    {
        $stmt = $this->pdo->prepare(self::INSERT_DEPARTMENT);
        foreach ($items as $item) {
            $params = array($item->getXmlId(), $item->getParentXmlId(), $item->getNameDepartment());
            $stmt->execute($params);
        }
    }

}