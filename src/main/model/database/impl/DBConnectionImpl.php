<?php
require_once __DIR__ . "/../DBConnection.php";
require_once __DIR__ . "/../../config.php";
require_once __DIR__ . "/../../../exception/ModelException.php";

class DBConnectionImpl implements DBConnection
{
    private ?PDO $pdo;
    private static ?DBConnectionImpl $instance = null;

    private function __construct()
    {
        $config = $GLOBALS['config'];
        $host = $config['DB']['DB_HOST'] . ":" . $config['DB']['DB_PORT'];
        $dbname = $config['DB']['DB_DATABASE'];
        $username = $config['DB']['DB_USERNAME'];
        $password = $config['DB']['DB_PASSWORD'];
        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @throws ModelException
     */
    public static function getInstance(): DBConnectionImpl
    {
        if (!self::$instance) {
            try {
                self::$instance = new self();
            } catch (PDOException $exception) {
                throw new ModelException("unable to connect to db: {$exception->getMessage()}");
            }
        }
        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->pdo;
    }

    function __destruct()
    {
        $this->pdo = null;
    }
}