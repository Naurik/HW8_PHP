<?php

function db_connect($database, $port = 3306)
{
    $connection = mysqli_connect('localhost','root','',$database, $port); //127.0.0.1
    if(mysqli_connect_errno())
        die(mysqli_connect_error()); //если ошибка подключение
    return $connection;
}
function db_checkOrDie($connection)
{
    if(!$connection || mysqli_errno($connection))
        die(mysqli_error($connection)); //если какая нибудь другая ошибка
}
function db_getConnectionFromTable($table){
    $table = explode('.',$table);
    return db_connect($table[0] ?? '');
}
function db_getTable($table){
    return explode('.',$table)[1] ?? '';
}
function db_escapeData($data, $connection){

    if(is_bool($data)&& !is_null($data))
    $data =mysqli_real_escape_string($connection, $data);

    if(is_numeric($data))
        return $data;
    if(is_string($data))
        return "'$data'";
    if(is_bool($data))
        return $data ? 1 : 0;
    if(is_null($data))
        return 'NULL';
    die('Incorrect $data ->' . $data);
}
function db_select($table, $cols = "*", array $where=[]){
    //Если $cols массив, то делаем строкой через запятую
    if(is_array($cols))
        $cols = implode(',',$cols);
    //разделяем на базу и таблицу
    $connection = db_getConnectionFromTable($table);
    //берем имя таблицы
    $table = db_getTable($table);
    //подключение к базе
    // базовый запрос
    $query = "SELECT $cols from `$table`";

    //если есть WHERE
    if(count($where)>0)
    {
        $query.=" WHERE";
        foreach ($where as $col => $value){
            $query .= " $col=" . db_escapeData($value,$connection);
        }
    }

    //SELECT * FROM $table WHERE
    //Пытаемся взять результат
    $result = mysqli_query($connection,$query);
    db_checkOrDie($connection);
    //Превращаем в ассоциативный массив
    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    //закрываем соединение
    mysqli_close($connection);
    //отдаем результат
    return $rows;
}
function db_insert($table, array $data){
    $connection = db_getConnectionFromTable($table);
    $table = db_getTable($table);

    $cols =  array_keys($data);
    $cols = implode(',',$cols);

    $values = array_map(function($item) use ($connection){
        return db_escapeData($item,$connection);
    }, $data);

    $values = implode(',',$values);

    $query="INSERT INTO $table($cols) VALUES ($values)";
    $result = mysqli_query($connection,$query);

    if($result ==false)
        db_checkOrDie($connection);

    mysqli_close($connection);
    return $result;
}
function db_update($table, array $where, array $data){
    $connection = db_getConnectionFromTable($table);
    $table = db_getTable($table);

    $cols =  array_keys($data);
    $cols = implode(',',$cols);

    $values = array_map(function($item) use ($connection){
        return db_escapeData($item,$connection);
    }, $data);

    $values = implode(',',$values);
    $query = "UPDATE $table SET $cols = $values";
    if(count($where)>0){
        $query .= "WHERE";
        foreach ($where as $col => $value){
            $query .= "$col = " .db_escapeData($value, $connection);
        }
    }
   $result = mysqli_query($connection, $query);
    var_dump($query);
    if($result ==false)
        db_checkOrDie();
    mysqli_close($connection);

}
function db_delete($table, array $where){
}
