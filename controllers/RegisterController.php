<?php
class RegisterController extends Controller{

  const COMUNITYWRITE = "communityWrite";
  const PRODUCTREGIST = "productRegist";
  //글쓰기 화면 출력
  public function communityWriteAction(){
    if(!$this->_session->isAuthenticated()){
      return $this->redirect('/community');
    }
    return $this->render(array(
      "_token"=>$this->getToken(self::COMUNITYWRITE)
    ));
  }
  //글저장
  public function saveAction(){
    $token = $this->_request->getPost('_token');
    if(!$this->checkToken(self::COMUNITYWRITE, $token)){
      return $this->redirect('/'.self::COMUNITYWRITE);
    }
    $id = $_SESSION['id'];
    $passwd = $this->_request->getPost('passwd');
    $title  = $this->_request->getPost('title');
    $content = $this->_request->getPost('content');
    $upfile = "upfile";
    $this->_connect_model->get('Community')->writeCommunity($id,$passwd,$title,$content,$upfile);
    return $this->redirect('/community');
  }
  //상품등록화면 출력
  public function productRegistAction(){
    if(!$this->_session->isAuthenticated() && $this->_session->get('id')!="admin"){
      return $this->redirect('/');
    }
    return $this->render(array(
      "_token"=>$this->getToken(self::PRODUCTREGIST)
    ));
  }
  //상품등록
  public function registAction(){
    $token = $this->_request->getPost('_token');
    if(!$this->checkToken(self::PRODUCTREGIST, $token)){
      return $this->redirect('/'.self::PRODUCTREGIST);
    }
    $goodsName = $this->_request->getPost('goodsName');
    $goodsOrigin = $this->_request->getPost('goodsOrigin');
    $mainGroup = $this->_request->getPost('mainGroup');
    $subGroup = $this->_request->getPost('subGroup');
    $mainfile = "mainfile";
    $subfile = "subfile";
    $goodsPrice = $this->_request->getPost('goodsPrice');
    $goodsNumber = $this->_request->getPost('goodsNumber');

    $this->_connect_model->get('Product')->productRegist($goodsName,$goodsOrigin,$mainGroup,$subGroup,
                                                         $mainfile,$subfile,$goodsPrice,$goodsNumber);
    return $this->redirect("/productRegist");
  }
}
 ?>
