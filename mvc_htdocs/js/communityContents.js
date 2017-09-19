function check_input(){
  var node;
  //passwd_form 의 자식노드가 3개가 아닐떄
  
  if(document.passwd_form.childNodes.length!=5){
    //텍스트 노드와 input 태그노드 생성
    testNode = document.createTextNode("비밀번호:");
    document.passwd_form.appendChild(testNode);
    inputNode = document.createElement("input");
    inputNode.type='password';
    inputNode.name='b_passwd';
    document.passwd_form.appendChild(inputNode);
  }
}
