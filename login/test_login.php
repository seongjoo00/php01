<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>로그인</title>
    <style type="text/css">
        body,input,button{font-size:20px}
    </style>

    <script type="text/javascript">
        function form_check(frm){
            var uid = document.getElementById("uid");
            var pwd = document.getElementById("pwd");
            
            if(!uid.value){
                alert("아이디를 입력하세요.");
                uid.focus();
                return false;
            };

            if(!pwd.value){
                alert("비밀번호를 입력하세요.");
                pwd.focus();
                return false;
            };

            document.login_form.submit();
        };
    </script>
</head>
<body>
    <form action="test_login_ok.php" name="login_form" method="post">
        <p>
            아이디
            <input type="text" name="uid" id="uid">
        </p>

        <p>
            비밀번호
            <input type="text" name="pwd" id="pwd">
        </p>

        <p>
            <button type="button" onclick="form_check(this.form)">로그인</button>
        </p>
    </form>
</body>
</html>