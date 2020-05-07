<?php

//1. 이전페이지에서 데이터 받아오기

/* $--->php의 변수선언문은 $(달러임)

php도 대소문자 구분 해야함
$uname = $_POST["uname"];
(회원가입에서 데이터를 보내는 방식이 POST이기 때문에)

**폼태그에 name을 부여해야하는 아주 중요한 이유**
members.php에서 input에서 입력된 값이 궁금하면
$_POST[""]중괄호안에 form태그에 입력한 input name을 써주면됨 */


$name = $_POST["uname"];/* uname 값을 출력 */
$uid = $_POST["uid"];
$pwd = $_POST["pwd"];

/* 비밀번호 확인은 받을 필요없음
    비밀번호가 다르게 쓰는걸 방지하기 위해 있는것
 */
$mobile = $_POST["mobile"];
$email_id = $_POST["email_id"];
$email_dns = $_POST["email_dns"];
$gender = $_POST["gender"];
$reg_date = date("Y-m-d");/* 쿼리문만들때 거기다 직접써도 되지만미리만들어놓음 */


//2. 입력값 확인

/* js: document.wirte
php : echo

ex) echo $변수명

js: 변수와 문자를 연결 + 
php : 변수와 문자를 .(점) 으로연결 */
echo "이름:".$name."<br/>";/* uname 값을 가져온다  */
echo "아이디:".$uid."<br/>";
echo "비밀번호:".$pwd."<br/>";
/* echo "생년월일:".mb_substr($birthday,0,4)."-";
echo mb_substr($birthday,4,2)."-";
echo mb_substr($birthday,6)."<br/>";
echo "생년월일:".$birthday."<br/>"; */

$birthday = $_POST["birthday"];
$birthday1 = mb_substr($birthday,0,4);
$birthday2 = mb_substr($birthday,4,2);
$birthday3 = mb_substr($birthday,6);
$birthday = $birthday1."-".$birthday2."-".$birthday3;

echo "생년월일:".$birthday."<br/>";


echo "휴대폰번호:".$mobile."<br/>";
echo "이메일 아이디:".$email_id."@".$email_dns."<br/>";

$email = $email_id."@".$email_dns;
echo "성별:".$gender."<br/>";

/* php에서 소문자 y를 쓰면 뒤에 두자리수 네자리를 출력 시킬려면 대문자 Y 
    2010/01/20 ---> Y/m/d
    2010.01.20 ---> Y.m.d
    2010-01-20 ---> Y-m-d
    
    타임까지하는법
    echo date("Y-m-d H:m:s",time());
    시간은 apache 개발 나라국 기준으로 보임 ftp에 올려놓으면 정상으로 보임
*/
echo date("Y-m-d");

//3. 데이터베이스 연결
/*  php5.X : <?   /  mysql_
    php 7.X : <?php / mysqli_(아이언더바)
 */
/* $dbcon = mysqli_connect("localhost","root","") or die("접속실패 메세지"); */
/* $dbcon = mysqli_connect("host","아이디","비밀번호") or die("접속실패 메세지"); 
    wamp쓰는사람은 비밀번호가 00000이고 xampp는 비밀번호 없음
dbcon 개발자들이 주로사용하는 연결 변수 이름 */

//4. DB 선택
    //mysql_select_db(연결객체,"DB명");
    /* mysql_select_db($dbcon,"front1"); */
    /* 위에 $dbcon이 연결해주고 있음
    여기까지 cmd 콘솔창에서의 use database 까지 들어간 화면이라고 생각하면됨 
    --------------------------------------------------------------
    이렇게하면 database를 너무 많이 접속해야하기 때문에 이부분만 따로 만들어서
    필요할때마다 불러서 쓰는 방식을 사용함
    */

    //sytle에서 외부css 불러오는게 import ----> php에서 불러오는것은 include
    include "../inc/dbcon.php";
    //db연결 필요한 페이지들 마다 이거써주면됨

//5. 데이터 처리 (저장 insert / 수정 update / 삭제 delete / 검색 select)
    //쿼리 작성 php에서 쿼리문은 문자열처리해줘야함
    //php의 변수는 따움표안에들어가도 변수임
    //var a=1
    /* document.write("a");--->a
    document.write(a)--->1
    ----------------------------
    $a=1
    echo $a; ---->1
    echo "$a";---->1 */
    //testdb.members(testdb안에members)
    /*
    원래 이거임
     $sql = insert into members(
        uname,uid,pwd,birthday,mobile,email,gender,reg_date)
        values('".$name."','".$uid."','".$pwd."','".$birthday."','".$mobile."','".$email."','".$gender."','".$reg_date."'); */

    $sql = "insert into members(
        uname,uid,pwd,birthday,mobile,email,gender,reg_date)
        values('$name','$uid','$pwd','$birthday','$mobile','$email','$gender','$reg_date');";

    //값 확인
    echo $sql;
    /* break; *///다만들고나서 중간에 값만 확인하고 싶으면(밑에 db전달까지 다 만들었을경우)

    //db에 전달
    mysqli_query($dbcon,$sql);
        /* 
         cmd 창으로 전달해서 데이터가 자동으로 입력됨
        전달함수 = mysql_query(연결객체,쿼리)인자가 두개
        연결객체 --> mysql_connect 문장
        쿼리 --> 위에쓴쿼리문을 써야하는데 너무 기니깐 변수에 담아놓은것임
        */

    //db종료
    mysqli_close($dbcon);
    //값을 전달 했으면 닫자

    //페이지 이동
    echo "
    <script type='text/javascript'>
    location.href='result.php'
    </script>"//밑에 있는 방법말고 php안에 js를 쓸때는 따움표만 주의 해서 써줌
?>

<!-- 페이지 이동하는건 자바스크립트가 가지고 있음 -->
<!-- <script type="text/javascript">
    location.href="result.php"
</script> 이렇게 써도 되고 -->
