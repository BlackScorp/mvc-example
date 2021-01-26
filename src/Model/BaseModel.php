<?php

abstract class Model_BaseModel
{
    private static ?PDO $connection = null;

    private static function getConnection():PDO
    {
        if (self::$connection) {
            return self::$connection;
        }
        $dsn = 'mysql:host=' . DATABASE['host'] . ';dbname=' . DATABASE['dbname'] . ';charset=' . DATABASE['charset'];


        $connection = new PDO($dsn, DATABASE['username'], DATABASE['password']);

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$connection = $connection;
        return  $connection;
    }

    private static function getFields(): array
    {
        $excludeBaseModelFields = array_keys(get_class_vars(__CLASS__));
        $fields = array_keys(get_class_vars(get_called_class()));
        $fields = array_diff($fields, $excludeBaseModelFields);
        return $fields;
    }

    private static function getTableName(): string
    {
        $classParts = explode('_',get_called_class());
        return strtolower(array_pop($classParts));
    }

    public static function findById(int $id): ?self
    {
        $fields = self::getFields();
        $tableName = self::getTableName();
        $sql = "SELECT `" . implode("`,`", $fields) . "` 
        FROM ".$tableName." 
        WHERE id = :id
        LIMIT 1
        ";

        $connection = self::getConnection();
        $statement = $connection->prepare($sql);

        $statement->execute([':id'=>$id]);
        if($statement->rowCount() === 0){
            return null;
        }
        $statement->setFetchMode(PDO::FETCH_CLASS,get_called_class());
        return $statement->fetch();

    }
}