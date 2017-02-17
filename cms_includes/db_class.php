<?php

$db = new Database;

class Database
{
    function select($select, $from, $parameters)
    {
        global $pdo;

        $sql = "SELECT ".$select." FROM `".$from."` ".$parameters."";
        $result = $pdo->query($sql);

        if($result = $result->fetch())
        {
            return $result;
            return true;
        }
        else
        {
            return false;
        }
    }

    function delete($from, $parameters)
    {
        global $pdo;

        $sql = "DELETE FROM `".$from."` ".$parameters."";
        $s = $pdo->prepare($sql);
        $s->execute();

        return true;
    }

    function insert($into, $values)
    {
        global $pdo;

        $sql = "INSERT INTO `".$into."` ".$values."";
        $s = $pdo->prepare($sql);
        $s->execute();

        return true;
    }

    function last_insert_id()
    {
        global $pdo;

        return $pdo->lastInsertId();
    }
}

?>