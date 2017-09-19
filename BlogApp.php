<?php
class BlogApp extends AppBase {

  //dataBase 연결
  protected function doDbConnection(){
      $this->_connectModel->connect('master',
      array(
        'string'    => 'mysql:dbname=heo;host=localhost;charset=utf8',  //DB이름 - weblog
        'user'      => 'root',                                            //DB사용자명
        'password'  => 'korean'
      ));
  }

  //부모 경로 반환
  public function getRootDirectory(){
    return dirname(__FILE__);
  }
  //라우트 정의
  protected function getRouteDefinition(){
    return array(
      //indexAction (view : index.php)
      '/'                          => array('controller' => 'blog' , 'action' => 'index'),

      //nikes,adidas,others Action (view : productView.php)
      '/product/:action'           => array('controller' => 'blog'),
      //pageAction (view : productView.php)
      '/product/page/:kind/:num'   => array('controller' => 'blog' , 'action' => 'page'),
      //productContentAction (view : productContentView.php)
      '/productContent/:kind/:num' => array('controller' => 'blog' , 'action' => 'productContent'),
      //communityAction(view : communityView.php)
      '/community'                 => array('controller' => 'blog' , 'action' => 'community'),
      //pageAction(view : communityView.php)
      '/community/page/:num'       => array('controller' => 'blog' , 'action' => 'page'),
      //communityContentAction(view : communityCotentView.php)
      '/communityContent/:num'     => array('controller' => 'blog' , 'action' => 'communityContent'),
      //buyListAction (view : buyListView.php)
      '/buyList'                   => array('controller' => 'blog' , 'action' => 'buyList'),
      //pageAction (view : buyListView.php)
      '/buyList/page/:num'         => array('controller' => 'blog' , 'action' => 'page'),


      //communityWriteAction(view : communityWrite.php)
      '/communityWrite'            => array('controller' => 'register' , 'action' => 'communityWrite'),
      //savaAction(view : communityView.php)
      '/community/save'            => array('controller' => 'register' , 'action' => 'save'),
      //productRegistAction(view : productRegist.php)
      '/productRegist'             => array('controller' => 'register' , 'action' => 'productRegist'),
      //registAction(view : productRegist.php)
      '/productRg/regist'            => array('controller' => 'register' , 'action' => 'regist'),
      //membershipViewAction(view : MembershipView.php)
      '/membershipView'            => array('controller' => 'account' , 'action' => 'membershipView'),
      //loginViewAction(view : loginView.php)
      '/loginView'                 => array('controller' => 'account' , 'action' =>'loginView'),
      //register,login,logOut Action
      '/account/:action'           => array('controller' => 'account'),


      //downAction
      '/fileDownload/:num'         => array('controller' => 'fileDownload' , 'action' => 'down')
    );
  }
}
 ?>
