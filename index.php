<?php
    session_start();//로그인되었는지 알수 있음

    
    //로그인전 오류문자 안나오게 하는방법
    $sid = isset($_SESSION["uid"])? $_SESSION["uid"]:"";
    //isset 이런상황에서 이거로 바꿔줘
    //(조건)? A:B;
    //세션아이디가 있으면(A) 세션아이디 띄우고 없으면(B) 아무것도 띄우지마;
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript">
        function log_out(){
        var n = confirm("정말로 로그아웃 하시겠습니까?");
        if(n){
            location.href="login/logout.php"
        };
    };
    </script>
</head>
<body>
    
    <?php if(!$sid){//로그인되었는 session으로 알수 있으니깐 session이 없으면 ?>
        <?php echo "hello~!" ?>
        <!-- 로그인전 -->
        <p>
        <a href="login/login.php">로그인</a>
        <a href="member/join.php">회원가입</a>
        </p>
    <?php    } else{ ?>
        <!-- 로그인 후 -->
    <?php echo $_SESSION["uname"] ?>
    <p>
    <a href="#" onclick="log_out()">로그아웃</a>
    <!-- <a href="login/logout">로그아웃</a> -->
    <a href="member/join.php">회원가입</a>
    </p>
    <?php }; ?>
    
    <!--  
        if(){
            로그인전
        }else{
            로그인후
        }
    -->
    <script type="text/javascript">
        
    </script>
</body>
</html>