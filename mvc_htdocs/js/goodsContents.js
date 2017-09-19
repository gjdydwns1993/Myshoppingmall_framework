var s = document.getElementById("loginId").innerHTML;
console.log(s);
//현재 로그인한 사용자가 admin 일때 상품구입버튼을 상품삭제 버튼으로 바꿈
if(s=="admin"){
  document.getElementById("button").remove();
  var node = document.createElement("button");
  node.innerHTML="상품삭제";
  node.id="button";
  document.getElementById("delete_form").appendChild(node);
}
