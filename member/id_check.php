<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>아이디 중복검색</title>
    <style type="text/css">
    body,input,button{font-size:20px}
    .nid{color:red}
    </style>
    <script type="text/javascript">
    function id_search(){
        var txt =document.getElementById("search_id");
        var nid =document.getElementById("nid");

        if(!txt.value){
            /* alert(); */
            nid.innerHTML="아이디를 입력해 주세요.";
            txt.focus();
            return false;
        };

        document.id_check_form.submit();
    };
    </script>
</head>
<body>
    <p>검색할 아이디를 입력하세요.</p>
    <form action="id_search.php" name="id_check_form" method="post">
        <input type="text" name="search_id" id="search_id">
        <button type="button" onclick="id_search()">아이디 검색</button>
    </form>

    <span id="nid" class="nid"></span>
</body>
</html>