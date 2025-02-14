<?php

require('db.php');



function dd($value) // to be deleted
{
  echo "<prev>", print_r($value, true), "</prev>";
  die();

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
  }  else {
    // return records that match conditions .....
    // $sql = "SELECT * FROM $table WHERE username='devshuk' AND admin=1";

    $i = 0;
    foreach ($conditions as $key => $value) {
      if ($i === 0){
        $sql = $sql . "WHERE $key=$value";
      } else {
        $sql = $sql . "AND $key=$value";
      }
      $i++;
    }
    dd($sql);
  }

}

$conditions = [
  'admin' => 1,
  'username' => 'devshuk'
];


$blogs = selectAll('blogs', $conditions);
dd($blogs);