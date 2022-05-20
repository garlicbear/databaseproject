<!DOCTYPE html>
<?php
function show_index(){
  echo "<li><a href='/test/mypage.php'> 나의 관찰 기록 보기</a></li>";
  echo "<li><a href='/test/search.php'> 관찰 기록 검색하기</a></li>";
  echo "<li><a href='/test/insert.php'> 관찰 기록 추가하기</a></li>";
  echo "<li><a href='/test/delete.php'> 관찰 기록 삭제하기</a></li>";
  echo "<li><a href='/test/update.php'> 관찰 기록 수정하기</a></li>";
}
session_start();
$con=mysqli_connect("localhost", "root", "next0101", "animal");
function true_login($id,$pw){
  #member 테이블 불러와서, id, pw 확인하기
  $con=mysqli_connect("localhost", "root", "next0101", "animal");
  $sql="select *,count(*) count from member where member_id='{$id}' and password='{$pw}';";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_array($result);
  if ($row["count"]==0){
    return -1;
  }
  else{
      if ($row["expert_O"]=="T"){
        return "전문가";
      }
      else{
        return "일반인";
      }
  }

} ?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <a href="/test/index.php"><h1>함께 만드는 야생동물 관찰 일지</h1></a>
  </head>
  <body>
    <p>오늘도 관찰! 내일도 관찰!</p>
    <p>로그인해주세요</p>
    <?php
      include "login.php";
      if (!empty($_POST['login_id']) and !empty($_POST['login_pw'])){
        #만약 비밀번호와 id가 맞으면 창을 전환한다.
        $login_info=true_login($_POST['login_id'],$_POST['login_pw']);
        if ($login_info==-1){
           echo "<p>비밀번호 혹은 아이디가 맞지 않습니다. 다시 로그인해주세요.</p>";
        }
        else{
          $_SESSION["login_id"]=$_POST['login_id'];
          $_SESSION["login_pw"]=$_POST['login_pw'];
          echo "<p>{$login_info} 용으로 로그인되었습니다.</p>";
          if ($login_info=="전문가"){
            echo '<a href="/test/firstpage_ex.php"><p>홈페이지로 들어가기</p></a>';
          }
          else{
            echo '<a href="/test/firstpage.php"><p>홈페이지로 들어가기</p></a>';
          }
        }
      }

     ?>

  </body>
</html>
