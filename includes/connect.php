<?php

require('db.php');



function dd($value) // to be deleted
{
  echo "<prev>", print_r($value, true), "</prev>";
  die();

}

function executeQuery($sql, $data)
{
  global $connect;
  $stmt = $connect->prepare($sql);
  $values = array_values($data);
  $types = str_repeat('s', count($values));
  $stmt->bind_param($types, ...$values);
  $stmt->execute();
  return $stmt;
}


function selectAll($table, $conditions = [])
{
  global $connect;
  $sql = "SELECT * FROM $table";
  if (empty($conditions)) {
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
  } else {

    $i = 0;
    foreach ($conditions as $key => $value) {
      if ($i === 0) {
        $sql = $sql . " WHERE $key=?";

      } else {
        $sql = $sql . " AND $key=?";

      }
      $i++;
    }

    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;

  }

}


function selectOne($table, $conditions)
{
  global $connect;
  $sql = "SELECT * FROM $table";

  $i = 0;
  foreach ($conditions as $key => $value) {
    if ($i === 0) {
      $sql = $sql . " WHERE $key=?";

    } else {
      $sql = $sql . " AND $key=?";

    }
    $i++;
  }

  $sql = $sql . " LIMIT 1";
  $stmt = executeQuery($sql, $conditions);
  $records = $stmt->get_result()->fetch_assoc();
  return $records;



}


function create($table, $data)
{
  global $connect;
  $sql = "INSERT INTO $table SET ";


  $i = 0;
  foreach ($data as $key => $value) {
    if ($i === 0) {
      $sql = $sql . " $key=?";

    } else {
      $sql = $sql . ", $key=?";

    }
    $i++;
  }

  $stmt = executeQuery($sql, $data);
  $id = $stmt->insert_id;
  return $id;

}


function update($table, $id, $data)
{
    global $connect;
    
    $sql = "UPDATE $table SET ";
    
    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql .= " $key=?";
        } else {
            $sql .= ", $key=?";
        }
        $i++;
    }
    
    $sql = $sql . " WHERE id=?";
    
    // Add ID to data array
    $data['id'] = $id;
    
    // Execute the query
    $stmt = executeQuery($sql, array_values($data));
    return $stmt->affected_rows;
}


function delete($table, $id)
{
    global $connect;
    
    $sql = "DELETE FROM $table WHERE id=?";
    
    // Execute the query
    $stmt = executeQuery($sql, [$id]);
    return $stmt->affected_rows;
}





