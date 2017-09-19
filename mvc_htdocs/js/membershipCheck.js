function check_input(){
  if(!document.member_form.id.value){
    alert("아이디를 입력하세요");
    document.member_form.id.focus();
    return;
  }
  if(!document.member_form.passwd.value){
    alert("비밀번호를 입력하세요");
    document.member_form.passwd.focus();
    return;
  }
  if(!document.member_form.passwd_confirm.value){
    alert("비밀번호확인을 입력하세요");
    document.member_form.passwd_confirm.focus();
    return;
  }
  if(!document.member_form.name.value){
    alert("이름을 입력하세요");
    document.member_form.name.focus();
    return;
  }
  if(!document.member_form.nick.value){
    alert("닉네임을 입력하세요");
    document.member_form.nick.focus();
    return;
  }
  if(!document.member_form.phone2.value || !document.member_form.phone3.value ){
    alert("휴대폰 번호를 입력하세요");
    document.member_form.phone2.focus();
    document.member_form.phone3.focus();
    return;
  }
  if(document.member_form.passwd.value !=document.member_form.passwd_confirm.value){
    alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");
    document.member_form.passwd.focus();
    document.member_form.passwd.select();
    return;
  }
  alert("회원가입완료!");
  document.member_form.submit();
}
