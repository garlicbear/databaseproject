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
        <title>로그인</title>
    </head>

    <body>
        <h1>로그인</h1>
        <form method="POST" action="/test/index.php">
        <p>
            아이디(이메일) :
            <input type="text" name="login_id">
        </p>
        <p>
            비밀번호 :
            <input type="password" name="login_pw" >
        </p>
        <p><input type="submit" value="로그인"></p>
        </form>

    </body>

</html>
