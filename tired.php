<?php
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

}

echo true_login("kelly","001");?>
