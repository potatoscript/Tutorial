<?php
header('Content-Type:application/json');
$list=array();
$data=array();

require_once 'dbconfig.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname",
    $username,
    $password);

    $sql = " SELECT distinct ref_id FROM td_013 ";
    $result = $conn->prepare($sql);
    $result -> execute();
    $i=0;
    while ($row =$result->fetch(PDO::FETCH_ASSOC)) {
      $id[$i]=$row['ref_id'];
      $i++;
    }

    $sql = "SELECT ref_id,body,head FROM td_013 ";
    $result = $conn->prepare($sql);
    $result -> execute();
    $i=0;
    while ($row =$result->fetch(PDO::FETCH_ASSOC)) {
      $id2[$i]=$row['ref_id'];
      $header[$i]=$row['head'];
      $body[$i]=$row['body'];
      $i++;
    }

    for($i=0;$i<sizeof($id);$i++){
      $data[0]=$id[$i];
      $col1 = " ";
      $col2 = " ";
      for($j=0;$j<sizeof($id2);$j++){
        if($id2[$j]==$id[$i]){
          if($header[$j]=="col1"){
            $col1.=$body[$j]."#";
          }
          if($header[$j]=="col2"){
            $col2.=$body[$j]."#";
          }
        }
      }
      $data[1]=$col1;
      $data[2]=$col2;
      array_push($list,$data);
    }

    $conn = null;

} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" .
    $pe->getMessage());
}

echo json_encode($list);

?>
