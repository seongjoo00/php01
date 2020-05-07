<?php
//일단 session을 켜봐야 값이 있는지 없는지 알 수 있으니깐
    session_start();

//세션 삭제
    unset($_SESSION["uid"]);//삭제해라 지워라 $_SESSION[uid를]
?>
<script type="text/javascript">
    alert("로그아웃되었습니다.");
    location.href="../index.php"
</script>