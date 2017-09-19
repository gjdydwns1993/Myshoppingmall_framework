<?php
class AccountController extends Controller{

  const LOGIN = "loginView";
  const MEMBERSHIP = "membershipView";
  //회원가입 화면 보여주는 메서드
  public function membershipViewAction(){

    if($this->_session->isAuthenticated()){
      return $this->redirect('/');
    }

    $membership_view = $this->render(array(
      "_token"=>$this->getToken(self::MEMBERSHIP)
    ));
    return $membership_view;
  }
  //회원가입
  public function registerAction(){
    if(!$this->_request->isPost()){
      $this->httpNotFound(); //FileNotFoundException 예외객체를 생성
    }
    $token = $this->_request->getPost('_token');
    if(!$this->checkToken(self::MEMBERSHIP, $token)){
      return $this->redirect('/'.self::MEMBERSHIP);
    }
    $id = $this->_request->getPost('id');
    $passwd = $this->_request->getPost('passwd');
    $name = $this->_request->getPost('name');
    $nick = $this->_request->getPost('nick');
    $sex = $this->_request->getPost('sex');
    $phone = $this->_request->getPost('phone1');
    $phone .="-".$this->_request->getPost('phone2');
    $phone .="-".$this->_request->getPost('phone3');
    $address = $this->_request->getPost('address');

    $this->_connect_model->get('User')->membership($id,$passwd,$name,$nick,$sex,$phone,$address);
    return $this->redirect('/');


  }
  //로그인 메서드
  public function loginAction(){
    if(!$this->_request->isPost()){
      $this->httpNotFound(); //FileNotFoundException 예외객체를 생성
    }
    if($this->_session->isAuthenticated()){
      return $this->redirect('/');
    }
    $token = $this->_request->getPost('_token');
    if(!$this->checkToken(self::LOGIN, $token)){
      return $this->redirect('/'.self::LOGIN);
    }
    $id = $this->_request->getPost('id');
    $passwd = $this->_request->getPost('passwd');
    $user = $this->_connect_model->get('User')->getUserRecord($id);

    //user id 가 없거나  비밀번호가 다를경우
    if(!$user || $user['b_passwd']!=$passwd){
      $errors='인증 에러임';
    }else{
      $this->_session->setAuthenticateStaus(true);
      $this->_session->set('id',$user['b_id']);
      return $this->redirect('/');
    }
    return $this->render(
      array(
      'errors'=>$errors,
    ),'loginView');

  }
  //로그인 화면 보여주는 메서드
  public function loginViewAction(){

    if($this->_session->isAuthenticated()){
      return $this->redirect('/');
    }

    $login_view = $this->render(array(
      '_token' => $this->getToken(self::LOGIN)
    ));
    return $login_view;
  }
  //로그아웃
  public function logoutAction(){
    $this->_session->clear();
    $this->_session->setAuthenticateStaus(false);
    return $this->redirect('/');
  }

}
 ?>
