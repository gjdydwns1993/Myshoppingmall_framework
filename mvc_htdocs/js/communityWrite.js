function check_input(){
  if(!document.community_form.title.value){
    alert("글 제목을 입력하시오");
    document.community_form.title.focus();
    return;
  }
  if(!document.community_form.passwd.value){
    alert("비밀번호를 입력하시오");
    document.community_form.passwd.focus();
    return;
  }
  if(!document.community_form.content.value){
    alert("글 내용을 입력하시오");
    document.community_form.content.focus();
    return;
  }
  alert("글작성완료!");
  document.community_form.submit();
}
