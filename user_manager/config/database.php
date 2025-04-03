<?php
if(!defined('_INCODE')) die('Access deniced....');
// ở đây chứa các hàm liên quan tới database

function query($sql, $data=[], $statementStatus=false){
    global $conn;
    $query = false;
    try{
        $statement = $conn->prepare($sql);

        if (empty($data)){
            $query = $statement->execute();
        }else{
            $query = $statement->execute($data);
        }

    }catch (Exception $exception){
        echo $exception->getMessage().'<br/>';
        echo 'File: '.$exception->getFile().' - Line: '.$exception->getLine();
    }

    if ($statementStatus && $query){
        return $statement;
    }

    return $query;
}

function insert($table, $dataInsert){

    $keyArr = array_keys($dataInsert);
    $fieldStr = implode(', ', $keyArr);
    $valueStr = ':'.implode(', :', $keyArr);

    $sql = 'INSERT INTO '.$table.'('.$fieldStr.') VALUES('.$valueStr.')';

    return query($sql, $dataInsert);
}

function update($table, $dataUpdate, $condition=''){

   $updateStr = '';
   foreach ($dataUpdate as $key=>$value){
        $updateStr.=$key.'=:'.$key.', ';
   }

   $updateStr = rtrim($updateStr, ', ');

   if (!empty($condition)){
       $sql = 'UPDATE '.$table.' SET '.$updateStr.' WHERE '.$condition;
   }else{
       $sql = 'UPDATE '.$table.' SET '.$updateStr;
   }

   return query($sql, $dataUpdate);
}

function delete($stable, $condition=''){
    if(!empty($condition)){
        $sql = "DELETE FROM $table WHERE $condition";
    }else {
        $sql = "DELETE FROM $table";
    }

    return query($sql);
}

//Lấy dữ liệu từ câu lệnh SQL - Lấy tất cả
function getRaw($sql){
    $statement = query($sql, [], true);
    if (is_object($statement)){
        $dataFetch = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $dataFetch;
    }

    return false;
}

//Lấy dữ liệu từ câu lệnh SQL - Lấy 1 bản ghi
function firstRaw($sql){
    $statement = query($sql, [], true);
    if (is_object($statement)){
        $dataFetch = $statement->fetch(PDO::FETCH_ASSOC);
        return $dataFetch;
    }

    return false;
}

//Lấy dữ liệu theo table, field, condition
function get($table, $field='*', $condition=''){
    $sql = 'SELECT '.$field.' FROM '.$table;
    if (!empty($condition)){
        $sql.=' WHERE '.$condition;
    }

    return getRaw($sql);
}

function first($table, $field='*', $condtion=''){
    $sql = 'SELECT '.$field.' FROM '.$table;
    if (!empty($condition)){
        $sql.=' WHERE '.$condition;
    }

    return firstRaw($sql);
}

function getRows($sql){

}
