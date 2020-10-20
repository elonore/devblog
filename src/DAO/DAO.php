<?php
    namespace APP\src\DAO;

    use PDO;
    use Exception;



abstract class DAO
{ 
    const DB_HOST = 'mysql:host=localhost;dbname=devblog;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';
    
    private $connection;

    private function checkConnection()
    { 
        if($this->connection===null) {  
            return $this->getConnection();
        } else { 
            return $this->connection;
        }
    }

    private function getConnection()
    { 
        try { 
            $this->connection = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } catch (Exception $errConnect) { 
            die('Erreur de connection : '.$errConnect->getMessage());
        }
    }

    protected function createQuery($sql, $params = null)
    { 
        if($params){ 
            $result = $this->checkConnection()->prepare($sql);
            $result->setFetchMode(PDO::FETCH_CLASS, static::class);
            $result->execute($params);
            return $result;
        } else { 
            $result = $this->checkConnection()->prepare($sql);
            $result->setFetchMode(PDO::FETCH_CLASS, static::class);
            $result->execute();
            return $result;

        }
    }
}
