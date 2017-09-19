<?php
class BlogController extends Controller{

  const PRODUCTCONTENT = "productContent/detail/";
  //메인화면 보여주는 메서드
  public function indexAction(){

    $index_view = $this->render(array(
    ));
    return $index_view;
  }
  //상품들 출력 메서드
  //$actionName = 액션이름 , $pageNumber = 페이지번호
  public function productAction($actionName,$pageNumber=null){

    $product = $this->_connect_model->get('Product')->getProduct($actionName,$pageNumber);
    return $product;
  }
  //나이키 클릭했을때
  public function nikesAction(){
    $actionName = "nike";
    //페이징
    $pageNumbers = $this->_connect_model->get('Paging')->getPageNumbers('product',$actionName);
    $product = $this->productAction($actionName);
    return $this->render(array(
      "product"=>$product,
      "pageNumbers"=>$pageNumbers
    ),'productView');
  }
  //아디다스 클릭 했을때
  public function adidasAction(){
    $actionName = "adidas";
    //페이징 전체
    $pageNumbers = $this->_connect_model->get('Paging')->getPageNumbers('product',$actionName);

    $product = $this->productAction($actionName);
    return $this->render(array(
      "product"=>$product,
      "pageNumbers"=>$pageNumbers
    ),'productView');
  }
  //나머지 상품 클릭 했을때
  public function othersAction(){
    $actionName = "others";
    $pageNumbers = $this->_connect_model->get('Paging')->getPageNumbers('product',$actionName);
    $product = $this->productAction($actionName);
    return $this->render(array(
      "product"=>$product,
      "pageNumbers"=>$pageNumbers
    ),'productView');
  }
  //자유게시판 클릭 했을때
  public function communityAction(){
      $pageNumbers = $this->_connect_model->get('Paging')->getPageNumbers('community');
      $result = $this->_connect_model->get('Community')->getCommunity();
    return $this->render(array(
        "result"=>$result,
        "pageNumbers"=>$pageNumbers
    ),'communityView');
  }
  //상품목록 화면 클릭 했을때
  public function buyListAction(){

    if(!$this->_session->isAuthenticated()){
      return $this->redirect('/');
    }
    $user = $_SESSION['id'];
    $pageNumbers = $this->_connect_model->get('Paging')->getPageNumbers('history');
    $result = $this->_connect_model->get('Product')->getBuyList($user);
    return $this->render(array(
      "result"=>$result,
      "pageNumbers"=>$pageNumbers
    ),'buyListView');
  }
  //상품목록에서 페이지 번호클랙했을때
  public function pageAction(){
    //요청 url 가져옴
    $requestUri = $this->_request->getRequestUri();
    $arr = explode("/",$requestUri);
    $arrInCount = count($arr);

    if($arrInCount==6){ // 상품에서 페이징
      //액션 이름(nike , adidas , others)
      $actionName = $arr[4];
      //클릭한 페이지 번호
      $pageNumber = $arr[5];
      $pageNumbers = $this->_connect_model->get('Paging')->getPageNumbers('product',$actionName);
      $product = $this->productAction($actionName,$pageNumber);

      return $this->render(array(
        "product"=>$product,
        "pageNumbers"=>$pageNumbers
      ),'productView');

    }else if($arrInCount==5){// 커뮤니티에서,구매목록 페이징
      //액션 이름(community,buyList);
      $actionName = $arr[2];
      $pageNumber = $arr[4];
      if($actionName == "community"){//커뮤니티

        $pageNumbers = $this->_connect_model->get('Paging')->getPageNumbers('community');
        $result = $this->_connect_model->get('Community')->getCommunity($pageNumber);
        return $this->render(array(
          "result"=>$result,
          "pageNumbers"=>$pageNumbers
        ),'communityView');

      }else if($actionName == "buyList"){//구매목록
        $user = $this->_session->get('id');
        $pageNumbers = $this->_connect_model->get('Paging')->getPageNumbers('history');

        $result = $this->_connect_model->get('Product')->getBuyList($user,$pageNumber);

        return $this->render(array(
          "result"=>$result,
          "pageNumbers"=>$pageNumbers
        ),'buyListView');
      }
    }
  }
  //자유게시판 게시글보기
  public function communityContentAction(){
    $requestUri = $this->_request->getRequestUri();
    $arr = explode("/",$requestUri);
    $bno = $arr[3];
    $result=$this->_connect_model->get('Community')->getContent($bno);
    return $this->render(array(
      "result"=>$result
    ),"communityContentView");
  }
  public function productContentAction(){
    $requestUri = $this->_request->getRequestUri();
    $arr = explode("/",$requestUri);
    $bno = $arr[4];
    $result = $this->_connect_model->get('Product')->getProductContent($bno);
    $subPhoto = explode("*",$result['subPhoto']);
    //상품정보화면에서 세부정보화면의 경로
    if($arr[3]=="detail"){
      $additionalDir ='/othersView/detailProductInfo';
    }else{
      $additionalDir ='/othersView/exchange';
    }
    return $this->render(array(
      "result"=>$result,
      "subPhoto"=>$subPhoto,
      "additionalDir"=>$additionalDir,
      "_token"=>$this->getToken(self::PRODUCTCONTENT.$bno)
    ),"productContentView");
  }
  //상품구매
  public function buyAction(){
    if(!$this->_request->isPost()){
      $this->httpNotFound();
    }
    $bno = $this->_request->getPost('b_no');
    $token = $this->_request->getPost('_token');
    //로그인 판별
    if(!$this->_session->isAuthenticated()){
      return $this->redirect('/productContent/detail/'.$bno);
    }
    //올바른 경로로 접속했는지 판단
    if(!$this->checkToken(self::PRODUCTCONTENT.$bno, $token)){
      return $this->redirect('/');
    }
    $id = $_SESSION['id'];
    $goodsName = $this->_request->getPost('b_goodsName');
    $goodsPrice = $this->_request->getPost('b_goodsPrice');
    $this->_connect_model->get('History')->saveBuyProduct($id,$goodsName,$goodsPrice);
    $this->_connect_model->get('Product')->adjustGoodsNumber($bno);
    return $this->redirect('/productContent/detail/'.$bno);
  }


}
 ?>
