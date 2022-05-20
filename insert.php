관찰 기록을 추가하는 페이지입니다. 구현 완료
<form method="POST" action="insert.php">
  <p>
      목:
      <input type="text" name="order">
  </p>
  <p>
      과:
      <input type="text" name="family">
  </p>
  <p>
      속:
      <input type="text" name="genus">
  </p>
  <p>
      종:
      <input type="text" name="species">
  </p>

  <p>
      관찰한 연도(형식: 숫자):
      <input type="text" name="year">
      관찰한 달(형식: 숫자):
      <input type="text" name="month">
      관찰한 날(형식: 숫자):
      <input type="text" name="day">
  </p>
  <p>
      관찰한 나라:
      <input type="text" name="country">
  </p>
  <p><input type="submit" value="제출하기"></p>

</form>

<?php
#값 받기
function is_array_empty($name_array) {
    foreach($name_array as $elm) {
        if(empty($elm)) return True;
    }
    return False;
}

session_start();

if (!is_array_empty($_POST) and $_POST!=[]){
  print_r($_POST);
  echo "값이 모두 입력되었습니다.";
  $order=$_POST["order"];
  $family=$_POST["family"];
  $genus=$_POST["genus"];
  $species=$_POST["species"];
  $country=$_POST["country"];
  $day=$_POST["day"];
  $month=$_POST["month"];
  $year=$_POST["year"];
  #db 서버 열기
  $con=mysqli_connect("localhost", "root", "next0101", "animal");
  #observe 추가
  $sql="
  INSERT INTO observe(year, month, day, species,country) VALUES
  ('{$year}','{$month}','{$day}','{$species}','{$country}'); ";

  $result=mysqli_query($con,$sql);

  #animal_info 추가
  $sql="
  INSERT INTO animal_info(order_, family, genus, species) VALUES
  ('{$order}','{$family}','{$genus}','{$species}'); ";

  $result=mysqli_query($con,$sql);

  #observe_sub 추가
  $nickname=$_SESSION["login_id"];
  $sql="
  INSERT INTO observe_sub(ob_nickname) VALUES
  ('{$nickname}'); ";

  $result=mysqli_query($con,$sql);

}
else{
  echo "값을 모두 입력해주세요";
}


 ?>
<p><a href="/test/firstpage.php">뒤로가기</a></p>
