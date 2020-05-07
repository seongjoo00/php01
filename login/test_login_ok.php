<?php
$uid = $_POST["uid"];
$pwd = $_POST["pwd"];
include "../inc/dbcon.php";
$sql = "select * from members where uid='$uid';";
$result = mysqli_query($dbcon,$sql);
$array = mysqli_fetch_array($result);

if(!$array["uid"]){
    echo
    "<script type='text/javascript'>
    alert('아이디가 일치하지 않습니다.');
    history.back();
    </script>";
};
if($array["uid"]){
    if($array["pwd"] != $pwd){
    
    echo "<script type='text/javascript'>
    alert('비밀번호가 일치하지 않습니다.');
    history.back();
    </script>";
    };
};

$_SESSION["uid"] = $array["uid"];

mysqli_close[$dbcon];

echo "<script type='text/javascript'>
location.href='../index.php'
</script>;"

?>