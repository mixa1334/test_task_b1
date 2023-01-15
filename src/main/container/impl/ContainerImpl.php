<?php
require_once __DIR__ . "/../Container.php";
require_once __DIR__ . "/../../model/database/impl/DBConnectionImpl.php";
require_once __DIR__ . "/../../model/dao/impl/UserDao.php";
require_once __DIR__ . "/../../model/dao/impl/DepartmentDao.php";
require_once __DIR__ . "/../../model/util/csv/impl/UserCsvReaderWriter.php";
require_once __DIR__ . "/../../model/util/csv/impl/DepartmentCsvReaderWriter.php";
require_once __DIR__ . "/../../model/util/csv/impl/PlainCsvReaderWriter.php";
require_once __DIR__ . "/../../model/service/impl/EntityServiceImpl.php";
require_once __DIR__ . "/../../model/service/impl/FileServiceImpl.php";

class ContainerImpl implements Container
{
    private array $objects = [];

    public function __construct()
    {
        $this->objects = [
            'DBConnection' => fn() => DBConnectionImpl::getInstance(),

            'UserDao' => fn() => new UserDao(),
            'DepartmentDao' => fn() => new DepartmentDao(),

            'UserCsvReaderWriter' => fn() => new UserCsvReaderWriter(),
            'DepartmentCsvReaderWriter' => fn() => new DepartmentCsvReaderWriter(),
            'PlainCsvReaderWriter' => fn() => new PlainCsvReaderWriter(),

            'UserService' => fn() => new EntityServiceImpl($this->get('UserCsvReaderWriter'), $this->get('UserDao'), $this->get('DBConnection')),
            'DepartmentService' => fn() => new EntityServiceImpl($this->get('DepartmentCsvReaderWriter'), $this->get('DepartmentDao'), $this->get('DBConnection')),
            'FileService' => fn() => new FileServiceImpl($this->get('PlainCsvReaderWriter')),
        ];
    }


    public function has(string $id): bool
    {
        return isset($this->objects[$id]);
    }

    public function get(string $id): mixed
    {
        return $this->objects[$id]();
    }

}