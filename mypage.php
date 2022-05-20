내 페이지입니다.
내 관찰 기록은 다음과 같습니다. 구현 완료


<style>
#text_box{
  background-color: white;
  position: absolute;
  left:50%;
  top:50%;
  width:1000px;
  height:500px;
  transform:translate(-50%,-50%);

}
</style>
<?php
$con=mysqli_connect("localhost", "root", "next0101", "animal");
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
<p><a href="/test/firstpage.php">뒤로가기</a></p>
