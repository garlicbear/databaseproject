<!DOCTYPE html>
<html>
<style>
  a {font-size: large;
  color:black;
  text-decoration: none;}
  p,h1,a {text-align: center;}
  h1{text-decoration: none;
  font-size:45px;}
</style>

    <head>
        <title>회원가입</title>
    </head>

    <body>
      <a href="animal_index.php"><h1>함께 만드는 야생동물 관찰 일지</h1></a>
      <p>오늘도 관찰! 내일도 관찰!</p>
        <h1>회원가입</h1>
        <form method="POST" action="register.php">
        <p>
            닉네임 :
            <input type="text" name="first_login_id">
        <p>
        <p>
            비밀번호 :
            <input type="password" name="first_login_pw">
        <p>
        <p>
            관심동물 :
            <input type="interest" name="interest">
        <p>
        <p><input type="submit" value="회원가입하기"></p>
        </form>
        <?php
        if ((!empty($_POST["interest"]))
        and (!empty($_POST["first_login_pw"]))
        and (!empty($_POST["first_login_id"]))){
          #DB연결
          $con=mysqli_connect("localhost", "root", "next0101", "animal");

          #중복여부 확인
          $a=$_POST["interest"];
          $b=$_POST["first_login_pw"];
          $c=$_POST["first_login_id"];

          $repeat_sql="select * from observer O where O.nickname='{$b}'";
          $result=mysqli_query($con,$repeat_sql);
          $row=mysqli_fetch_array($result);
          if ($row==NULL)
          {
            #중복이 아닌 경우
            $result=mysqli_query($con,
              "INSERT INTO observer
              (interest_animal,password,nickname)
              values(
              '{$a}',
              '{$b}',
              '{$c}'
            )");
            if ($result=1){
              echo "회원가입이 되었습니다. ";
              echo "<a href='animal_index.php'>돌아가기</a>";
            };
          }
        else
        {
          echo "중복 닉네임입니다. 다른 닉네임을 입력해주세요.";
        }
        };

        ?>
      </body>

</html>
