<style>
th,td{
    border: 1px solid #444444;
  }
</style>

<p>관찰 기록을 평가해주세요.</p> 구현 완료

<p>아직 평가되지 않은 관찰 기록은 아래와 같습니다. </p>
<?php
  $con=mysqli_connect("localhost", "root", "next0101", "animal");

  $sql="
          select *
          from observe_sub O
          where O.trust is null;";
  $result=mysqli_query($con,$sql);
  $num_row=mysqli_num_rows($result);
  if ($num_row==0){
    echo "모든 항목이 평가되었습니다.";
  }
  else{
    $ob_id_arr=array();
    while($result_array=mysqli_fetch_array($result)){
      array_push($ob_id_arr, $result_array["ob_id"]);
    }
    #앞에서 얻은 관찰번호를 이용해서, 정보 셀렉하기.
    session_start();
    echo'<table>
      <th>관찰번호</th><th>연도</th><th>월
      </th><th>일</th><th>종</th><th>관찰한 나라</th>
      ';
    foreach($ob_id_arr as $id){
      $sql="select *
            from observe A, observe_sub B
            where A.ob_id=B.ob_id
            and B.ob_id='{$id}';";
      $result=mysqli_query($con,$sql);
      while ($row=mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>".$row["ob_id"]."</td>";
        echo "<td>".$row["year"]."</td>";
        echo "<td>".$row["month"]."</td>";
        echo "<td>".$row["day"]."</td>";
        echo "<td>".$row["species"]."</td>";
        echo "<td>".$row["country"]."</td>";
        echo "</tr>";
      }
    }
    echo '</table>';



    echo '<form method="POST" action="update.php">
    <p>
          평가할 관찰 기록의 관찰 번호와 진위여부를 적어주세요:
          <input type="text" name="ob_id" placeholder="관찰 번호" >
          <input type="text" name="trust" placeholder="진위 여부">
          <input type="submit" value="제출하기">
      </p>'
      ;
    if (!empty($_POST["ob_id"]) and !empty($_POST["trust"])){
      $rate_id=$_POST["ob_id"];
      $trust=$_POST["trust"];
      $nickname=$_SESSION["login_id"];
      $sql="
      UPDATE observe_sub SET trust ='{$trust}',expert_id='{$nickname}'
      WHERE ob_id = '{$rate_id}';
      ";
      $result=mysqli_query($con,$sql);
      echo "완료했습니다.";
    }

  }
 ?>



<p><a href="/test/firstpage_ex.php">뒤로가기</a></p>
