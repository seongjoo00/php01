
<?php
$dbcon = mysqli_connect("localhost","root","") or die("접속실패 메세지"); 
/* 여기까지는 cmd창에서 mysql -u root 까지 접속한 상태 */
 mysqli_select_db($dbcon,"testdb");
/* 여기는 use database까지 한거랑 같음 */

//문자셋 설정
mysqli_set_charset($dbcon,"utf8");
/* mysqli_set_charset(연결객체,문자셋); */
?>