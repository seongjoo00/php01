<?php
/* 여기서 쿼리를 얻은값은 이페이지 에서만 유효해 하지만 로그인은 모든페이지에서 유효해야하기때문에
session--->모든페이지에서 공통으로 사용할 수 있는 자원 */
session_start();
//이거없으면 로그인 유지할 수 없다 /한단어로 로그인 상태 유지

//1. 이전페이지에서 데이터 받아오기
$uid = $_POST["uid"];
$pwd = $_POST["pwd"];
//2. 입력값 확인

//3. 데이터베이스 연결
include "../inc/dbcon.php";

//4. DB 선택


//5. 데이터 처리 (저장 insert / 수정 update / 삭제 delete / 검색 select)
    //쿼리 작성 
    $sql = "select * from members where uid='$uid';";

    //값 확인
    

    //db에 전달
    $result = mysqli_query($dbcon,$sql);

    //결과값 리턴
    $array = mysqli_fetch_array($result);
    
    //값확인
    /*echo $row[1]; *///---->사용자의 이름의 index
   /* echo $row["uid"]; */
   /* echo $array["pwd"]; */

    //아이디가 존재하지 않는다면
    if(!$array["uid"]){
        echo 
        "<script type='text/javascript'>
        alert('일치하는 아이디가 없습니다.');
        history.back();
        </script>";
    };//php안에 들어있음

    //아이디가 존재하지만 비밀번호가 다른 경우
    if($array["uid"]){
        if($array["pwd"] != $pwd){//$array는 db에서 가져온값 $pwd는 사람들이 입력한값
        echo 
        "<script type='text/javascript'>
        alert('비밀번호가 일치하지 않습니다.');
        history.back();
        </script>";
    }
    };

    //session 변수
    $_SESSION["uid"] = $array["uid"];
    $_SESSION["uname"] = $array["uname"];//로그인후 상단에 사용자 이름뜨게 하기 위해
    //db종료
    mysql_close[$dbcon];

    //페이지 이동
    echo "
    <script type='text/javascript'>
    location.href='../index.php'
    </script>";
?>

