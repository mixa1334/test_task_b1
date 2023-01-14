<?php

interface DBConnection
{
    public function getConnection(): PDO;
}