관찰 기록을 삭제하는 페이지입니다. 구현 완료

<style>
th,td{
    border: 1px solid #444444;
  }
</style>
<?php
  include "show.php";
?>

<form method="POST" action="delete.php">
<p>
      삭제할 관찰 정보의 id를 적어주세요:
      <input type="text" name="del_id">
      <p><input type="submit" value="제출하기"></p>
  </p>
</form>
<?php

if (!empty($_POST)){
  #db 서버 열기
  $con=mysqli_connect("localhost", "root", "next0101", "animal");
  $del_id=$_POST["del_id"];
  $nickname=$_SESSION["login_id"];
  $sql="select *
        from observe O, observe_sub S
        where O.ob_id=S.ob_id
        and S.ob_nickname='{$nickname}'
        and O.ob_id='{$del_id}';";
  $result=mysqli_query($con,$sql);
  $del_species=mysqli_fetch_array($result)["species"];
  $sql="delete from observe_sub O where O.ob_id='{$del_id}';";
  $result=mysqli_query($con,$sql);

  $sql="
        select count(*) count
        from observe O
        where O.species='{$del_species}';";
  $result=mysqli_query($con,$sql);
  echo "삭제가 완료되었습니다.";
  $nickname= $_SESSION["login_id"];
  $sql="select *
        from observe A, observe_sub B
        where A.ob_id=B.ob_id
        and B.ob_nickname='{$nickname}';";
  $result=mysqli_query($con,$sql);
}?>
<?php
include "prettytable.php"; ?>
<p><a href="/test/firstpage.php">뒤로가기</a></p>
