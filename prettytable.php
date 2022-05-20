<style>
th,td{
    border: 1px solid #444444;
  }
</style>
  <table>
    <th>관찰번호</th><th>연도</th><th>월</th><th>일</th><th>종</th><th>관찰한 나라</th>
    <?php
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
   ?>
  </table>
</style>
