<?php
header('Content-Type:application/json');
$list=array();
$data=array();

require_once 'dbconfig.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname",
    $username,
    $password);

    $id1 = $_POST['id1'];
    $id2 = $_POST['id2'];
    $head1=$_POST['head1'];
    $head2=$_POST['head2'];
    $body = $_POST['body'];

    $sql="INSERT INTO td_013
      (
      id,
      body,
      head,
      ref_id
      )
      SELECT COALESCE(MAX(id),0)+1,
      '$body',
      '$head2',
      '$id2'
      FROM td_013 ";
    $conn->exec($sql);

    $sql = " DELETE FROM td_013
             WHERE trim(ref_id) = trim('$id1') AND
                 trim(body) = trim('$body') AND
                 trim(head)= trim('$head1')
           ";
    $conn->exec($sql);



  }
  catch(PDOException $e)
  {
    echo $sql . "<br>" . $e->getMessage();
  }



echo json_encode($list);
 ?>
