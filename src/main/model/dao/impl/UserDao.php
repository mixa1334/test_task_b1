<?php
require_once __DIR__ . "/../Dao.php";
require_once __DIR__ . "/../../entity/User.php";

class UserDao extends Dao
{
    private const SELECT_USERS = "SELECT xml_id AS xmlId,
       last_name AS lastName, 
       name,
       second_name AS secondName,
       department, 
       work_position AS workPosition, 
       email, 
       mobile_phone AS mobilePhone, 
       phone, 
       login, 
       password FROM users";
    private const INSERT_USER = "INSERT INTO users (
                   xml_id,
                   last_name,
                   name,
                   second_name,
                   department,
                   work_position,
                   email,
                   mobile_phone,
                   phone,
                   login,
                   password
                   ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


    function getAll(): array
    {
        $stmt = $this->pdo->prepare(self::SELECT_USERS);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, User::class);
    }

    function addAll(array $items): void
    {
        $stmt = $this->pdo->prepare(self::INSERT_USER);
        foreach ($items as $item) {
            $params = array(
                $item->getXmlId(),
                $item->getLastName(),
                $item->getName(),
                $item->getSecondName(),
                $item->getDepartment(),
                $item->getWorkPosition(),
                $item->getEmail(),
                $item->getMobilePhone(),
                $item->getPhone(),
                $item->getLogin(),
                $item->getPassword(),
            );
            $stmt->execute($params);
        }
    }

}