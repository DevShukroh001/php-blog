<?php

require('db.php');



function dd($value) // to be deleted
{
  echo "<prev>", print_r($value, true), "</prev>";
  die();

}

function selectAll($table)
{
  global $connect;
  $sql = "SELECT * FROM $table";
  $stmt = $connect->prepare($sql);
  $stmt->execute();
  $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  return $records;
}


$blogs = selectAll('blogs');
dd($blogs);


