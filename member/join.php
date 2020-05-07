<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>회원가입</title>
    <script type="text/javascript">
    function form_check(frm){
        var uname =document.getElementById("uname");
        var uid =document.getElementById("uid");
        var pwd =document.getElementById("pwd");
        var repwd =document.getElementById("repwd");
        var birthday =document.getElementById("birthday");
        var mobile =document.getElementById("mobile");
        var email_id =document.getElementById("email_id");
        var male =document.getElementById("male");
        var female =document.getElementById("female");
        var reg_spc = /[`~!@#$%^&*|\\\'\";:\/?]/;
        var reg_num = /[0-9]/;
        var reg_kor = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;
        

        /* uname */
        if(uname.value == ""){
            alert("이름을 입력하세요.");
            u_name.focus();
            return false;
        };
        if(uname.value == "\s"){
            alert("이름에는 공백을 사용할 수 없습니다.");
            uname.focus();
            return false;
        };
        
        if(reg_spc.test(uname.value) || reg_num.test(uname.value)){
            alert("이름은 한글과 영문만 사용할 수 있습니다.");
            uname.focus();
            return false;
        };

        /* uid */
        var len = uid.value.length;
        if(uid.value == ""){
            alert("아이디를 입력하세요.");
            uid.focus();
            return false;
        };
        if(uid.value == "\s"){
            alert("아이디에는 공백을 사용할 수 없습니다.");
            uid.focus();
            return false;
        };
        if(len < 6 || len > 12){
            alert("아이디는 6~12자 내외로 입력할 수 있습니다.");
            uid.focus();
            return false;
        };
        if(reg_spc.test(uid.value)){
            alert("아이디는 한글과 영문만 사용할 수 있습니다.");
            uid.focus();
            return false;
        };

        /* pwd */
        if(pwd.value == ""){
            alert("비밀번호를 입력하세요.");
            pwd.focus();
            return false;
        };
        if(pwd.value == "\s"){
            alert("비밀번호에는 공백을 사용할 수 없습니다.");
            pwd.focus();
            return false;
        };
        if(reg_kor.test(pwd.value)){
            alert("비밀번호에 한글은 사용 할 수없습니다.");
            pwd.focus();
            return false;
        };
        

        /* repwd */
        if(repwd.value == ""){
            alert("비밀번호확인을 입력하세요.");
            repwd.focus();
            return false;
        };
        if(pwd.value != repwd.value){
            alert("비밀번호를 확인하세요.");
            repwd.focus();
            return false;
        };

        /* birthday */
        if(birthday.value == ""){
            alert("생년월일을 입력하세요.");
            birthday.focus();
            return false;
        };
        if(birthday.value == "\s"){
            alert("생년월일을 공백없이 입력하세요.");
            birthday.focus();
            return false;
        };
        if(!reg_num.test(birthday.value)){
            alert("생년월일은 숫자만 입력해주세요.");
            birthday.focus();
            return false;
        };
        var len = birthday.value.length;
        if(len < 8 || len > 8){
            alert("생년월일을 입력하세요.");
            birthday.focus();
            return false;
        };

        /* mobile */
        var reg = /[0-9]/;
        if(mobile.value == ""){
            alert("휴대폰번호를 입력하세요.");
            mobile.focus();
            return false;
        };
        if(mobile.value == "\s"){
            alert("휴대폰번호는 공백없이 입력하세요.");
            mobile.focus();
            return false;
        };
        if(!reg.test(mobile.value)){
            alert("휴대폰번호에는 특수문자를 사용할 수 없습니다");
            mobile.focus();
            return false;
        };

        /* email */
        if(email_id.value == ""){
            alert("이메일을 입력하세요.");
            email_id.focus();
            return false;
        };
        if(email_id.value == "\s"){
            alert("이메일은 공백없이 입력하세요.");
            email_id.focus();
            return false;
        };

        var email_dns =document.getElementById("email_dns");
        var email_sel =document.getElementById("email_sel");
        if(email_dns.value == ""){
            alert("이메일을 선택하세요.");
            email_sel.focus();
            return false;
        }

        /* gender */
        if(!male.checked && !female.checked){
            alert("성별을 체크해주세요.");
            male.focus();
            return false;
        };
        frm.submit();
    };

    /* email select */
    function change_email(){
        var email_dns =document.getElementById("email_dns");
        var email_sel =document.getElementById("email_sel");

        var idx = email_sel.options.selectedIndex;
        var val = email_sel.options[idx].value;

        email_dns.value = val;
        if(idx == 0){email_dns.focus();};
    };

    /* 아이디 중복확인 */
    function idCheck(){
        window.open("id_check.php","p","width=600,height=300,left=100,top=100");
        /* 이름 안써주면 클릭할때마다 계속 팝업뜸 */
        /* window.open("팝업될 문서","팝업되었을때 이름","옵션"); */
    };
    </script>
</head>
<body>
    <form action="members.php" name="join_form" method="post">
        <fieldset>
            <legend>회원가입</legend>
                
                <p>
                    <label for="uname">이름</label>
                    <input type="text" name="uname" id="uname">
                </p>

                <p>
                    <label for="uid">아이디</label>
                    <input type="text" name="uid" id="uid" placeholder="6~12자 내외">
                    <button type="button" onclick="idCheck()">중복확인</button>
                </p>

                <p>
                    <label for="pwd">비밀번호</label>
                    <input type="password" name="pwd" id="pwd" maxlength="16">
                </p>

                <p>
                    <label for="repwd">비밀번호확인</label>
                    <input type="password" name="repwd" id="repwd" maxlength="16">
                </p>

                <p>
                <label for="birthday">생년월일</label>
                <input type="text" name="birthday" id="birthday" placeholder="ex)19941226">
                </p>

                <p>
                <label for="mobile">휴대폰번호</label>
                <input type="text" name="mobile" id="mobile" placeholder="ex)01055925614">
                </p>

                <p>
                <label for="email_id">이메일</label>
                <input type="text" name="email_id" id="email_id">@
                <input type="text" name="email_dns" id="email_dns">

                <select name="email_sel" id="email_sel" onchange="change_email()">
                    <option value="">직접입력</option>
                    <option value="naver.com">naver.com</option>
                    <option value="gmail.com">gmail.com</option>
                </select>
                </p>

                <p>
                <input type="radio" name="gender" id="male" value="M">
                <label for="male">남</label>
                <input type="radio" name="gender" id="female" value="F">
                <label for="female">여</label>
                </p>

                <button type="button" onclick="form_check(this.form)">회원가입</button>
                <button type="button">돌아가기</button>

        </fieldset>
    </form>
                
</body>
</html>