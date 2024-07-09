<?php

class Database {
    private PDO $pdo;
    public function __construct(array $config, string $username = "root", string $password = "")
    {
        $dsn = "mysql:" . http_build_query($config, '', ';');
        $this->pdo = new PDO($dsn, $username, $password);
    }

    public function query(string $query, array $params = [])
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

    
}