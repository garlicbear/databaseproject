일반인용 홈페이지입니다.
<?php
function show_index(){
  echo "<li><a href='/test/mypage.php'> 나의 관찰 기록 보기</a></li>";
  echo "<li><a href='/test/search.php'> 관찰 기록 검색하기</a></li>";
  echo "<li><a href='/test/insert.php'> 관찰 기록 추가하기</a></li>";
  echo "<li><a href='/test/delete.php'> 관찰 기록 삭제하기</a></li>";;
}
session_start();
$nickname=$_SESSION["login_id"];
echo "반갑습니다.".$nickname."님";
show_index();
echo "<li><a href='/test/index.php'> 로그인 화면으로 돌아가기</a></li>";
?>
