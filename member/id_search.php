<?php
/* id_check.php == join.php
id_search.php == members.php */

//1. 이전페이지에서 데이터 받아오기
$id_check = $_POST["search_id"];

//2. 입력값 확인
/* echo $id_check; */

//3. 데이터베이스 연결


    //문자셋 설정
//4. DB 선택
include "../inc/dbcon.php";

//5. 데이터 처리 (저장 insert / 수정 update / 삭제 delete / 검색 select)
    //쿼리 작성
    $sql = "select uid from members where uid='$id_check';";
    //값 확인
   /*  echo $sql; */

    //db에 전달
   $result = mysqli_query($db_search,$sql);/* 결과값을 가지고 와야해서 변수에 담아놓음 */
   //var i = prompt("TEXT","");이거랑같은거임

   //결과값 리턴
   /* db종료까지는 members와같음
    쿼리문을 전송하고 저장하는건 거기서 끝나지만 select문은 결과를 가지고 오는동작이 필요함 */
    $row = mysqli_num_rows($result);/* 행이 있나없나만 몇줄나왔어 */
    /* echo $row; */

    //결과 출력
?>

<!-- 검색페이지와 결과를 합친방법 -->
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>"<?php echo $id_check;?>"검색결과</title>
    <!-- ""의 아이디는 사용할 수 있습니다 -->
    <style type="text/css">
        body{font-size:20px}
        .t{color:#e89c21}
        .y{color:#4c8aed;font-weight:bold}
        .n{color:#ff4500;font-weight:bold}
    </style>

        <?php if(!$row){ ?><!-- 조건에 맞으면 script실행해 라는뜻 -->
            <script type="text/javascript">
        function return_id(){
            opener.document.getElementById("uid").value = "<?php echo $id_check; ?>";
            /* "따움표 잊지말고 넣기 왜냐면 따움표가 없으면 변수로 인식하기 때문에 */
            window.close();
            /* self.close(); */
        }
        </script>
        <?php } ?>
</head>
<body>
    <!-- !$row/존재하지 않는다   $row존재한다면 -->
    
    <?php if(!$row){ ?>
            <span class="t">"<?php echo $id_check; ?>"</span>(은)는 <sapn class="y">사용 가능한</sapn> 아이디 입니다.
            <a href="#" onclick="return_id()">[사용하기]</a>
    <?php }else{ ?>
        <span class="t">"<?php echo $id_check; ?>"</span>(은)는 <sapn class="n">사용할 수 없는</sapn> 아이디 입니다.
        <a href="javascript:history.back()">[돌아가기]</a>
    <?php } ?>

</body>
</html>

<?php
//결과 출력후에 DB종료
mysqli_close($db_search);
?>