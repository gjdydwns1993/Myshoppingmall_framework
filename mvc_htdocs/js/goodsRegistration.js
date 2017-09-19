function check_input(){
  if(!document.regist_form.goodsName.value){
    alert("상품명을 등록하시오");
    document.regist_form.goodsName.focus();
    return;
  }
  if(!document.regist_form.goodsOrigin.value){
    alert("상품 원산지를 등록하시오");
    document.regist_form.goodsOrigin.focus();
    return;
  }
  if(!document.regist_form.mainfile.value){
    alert("메인 상품 이미지를 등록하시오");
    document.regist_form.mainfile.focus();
    return;
  }
  if(!document.regist_form.goodsPrice.value){
    alert("상품 가격을 등록하시오");
    document.regist_form.goodsPrice.focus();
    return;
  }
  if(!document.regist_form.goodsNumber.value){
    alert("상품수량을 등록하시오");
    document.regist_form.goodsNumber.focus();
    return;
  }
  alert("상품 등록 완료!");
  document.regist_form.submit();
}
