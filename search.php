<li>다양한 정보 알기</li> 구현 완료
<?php
$con=mysqli_connect("localhost", "root", "next0101", "animal");
$sql="select *
      from observe A, observe_sub B
      where A.ob_id=B.ob_id";
$result=mysqli_query($con,$sql);
include "prettytable.php";
?>
<form method="POST" action="search.php">
<p>
      정보를 더 보고 싶은 관찰기록의 id를 입력하세요:
      <input type="text" name="id"><input type="submit" value="검색">
  </p>
</form>
<table>
  <th>관찰번호</th><th>연도</th><th>월</th><th>일</th>
  <th>목</th><th>과</th><th>속</th><th>종</th>
  <th>관찰한 나라</th><th>관찰자 id</th><th>신뢰 여부</th>
  <?php
  if (!empty($_POST["id"])){
    $id=$_POST["id"];
    $con=mysqli_connect("localhost", "root", "next0101", "animal");
    $sql="
      select A.ob_id,A.year, A.month, A.day, D.order_, D.family, D.genus,A.species,A.country,C.member_id,B.trust
      from observe A, observe_sub B, member C, animal_info D
      where A.ob_id=B.ob_id
      and A.ob_id='{$id}'
      and A.species=D.species
      and B.ob_nickname=C.member_id
      and C.expert_O='F';
      ";
    $result=mysqli_query($con,$sql);
    while ($row=mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>".$row["ob_id"]."</td>";
      echo "<td>".$row["year"]."</td>";
      echo "<td>".$row["month"]."</td>";
      echo "<td>".$row["day"]."</td>";
      echo "<td>".$row["order_"]."</td>";
      echo "<td>".$row["family"]."</td>";
      echo "<td>".$row["genus"]."</td>";
      echo "<td>".$row["species"]."</td>";
      echo "<td>".$row["country"]."</td>";
      echo "<td>".$row["member_id"]."</td>";
      echo "<td>".$row["trust"]."</td>";
      echo "</tr>";
    }
  }
  ?>
</table>
<p><a href="/test/firstpage.php">뒤로가기</a></p>
