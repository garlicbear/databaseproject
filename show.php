<?php
#선택된 데이터프레임의 column명 가져오기
function col_name($tablename){
  $con=mysqli_connect("localhost", "root", "next0101", "animal");
  $sql="
    SELECT `COLUMN_NAME`
    FROM `INFORMATION_SCHEMA`.`COLUMNS`
    WHERE `TABLE_SCHEMA`='animal'
    AND `TABLE_NAME`='{$tablename}';";
  $result=mysqli_query($con,$sql);
  $colname=array();

  while ($row=mysqli_fetch_array($result)){
      array_push($colname,$row[0]);
  }
}
#db 불러오기
$con=mysqli_connect("localhost", "root", "next0101", "animal");
#
session_start();
$nickname= $_SESSION["login_id"];
$sql="select *
      from observe A, observe_sub B
      where A.ob_id=B.ob_id
      and B.ob_nickname='{$nickname}';";
$result=mysqli_query($con,$sql);
echo $nickname."님의 관찰기록은 다음과 같습니다.";


 ?>
 <?php
 include "prettytable.php"; ?>
