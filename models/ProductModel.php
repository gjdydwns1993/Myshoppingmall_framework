<?php
require_once "../library/Library.php";

class ProductModel extends ExecuteModel{

  //상품 클릭시 조회수 증가
  public function adjustVisiNumber($vNum,$pBno){
    $sql = "update product set visitNumber=:visitNum where b_no=:bno";
    $this->execute($sql,array(
      ":visitNum"=>$vNum+1,
      ":bno"=>$pBno
    ));
  }
  //구입시 상품 수량 감소
  public function adjustGoodsNumber($pBno){
    $sql = "select * from product where b_no=:bno";
    $result=$this->getRecord($sql,array(
      ":bno"=>$pBno
    ));
    $goodsNumber = $result['goodsNumber'];
    $sql = "update product set goodsNumber=:goodsNumber where b_no=:bno";
    $this->execute($sql,array(
      ":goodsNumber"=>$goodsNumber-1,
      ":bno"=>$pBno
    ));
  }
  //상품 전체 출력
  public function getProduct($pActionName,$pPageNumber=null){
    if($pPageNumber!=null){
      $offsetNum = ($pPageNumber-1)*8;
      $sql = "select * from product
             where mainGroup=:actionName
             order by b_no desc limit 8 offset ".$offsetNum;
      $product = $this->getAllRecord($sql,array(
        ":actionName"=>$pActionName
      ));
      return $product;
    }else{
      $sql = "select * from product
              where mainGroup=:actionName
              order by b_no desc limit 8 offset 0";
      $product = $this->getAllRecord($sql,array(
        ":actionName"=>$pActionName
      ));
      return $product;
    }
  }
  //상품 구입 리스트 출력
  public function getBuyList($pUser,$pPageNumber=null){
    if($pPageNumber!=null){//번호가 있는지
      $offsetNum = ($pPageNumber-1)*8;
      if($pUser=="admin"){//운영자
        $sql = "select * from history
                order by b_no desc limit 8 offset ".$offsetNum;
      }else{//유저
        $sql = "select * from history
                where b_id='{$pUser}'
                order by b_no desc limit 8 offset ".$offsetNum;
      }
      $result = $this->getAllRecord($sql);
      return $result;
    }else{//번호가 없는지
      if($pUser=="admin"){//운영자
        $sql = "select * from history
                order by b_no desc limit 8 offset 0";
      }else{//유저
        $sql = "select * from history
                where b_id='{$pUser}'
                order by b_no desc limit 8 offset 0";
      }
      $result = $this->getAllRecord($sql);
      return $result;
    }
  }
  //상품 세부정보
  public function getProductContent($pBno){
    $sql = "select * from product where b_no=:bno";
    $result = $this->getRecord($sql,array(
      ":bno"=>$pBno
    ));
    $this->adjustVisiNumber($result['visitNumber'],$pBno);
    return $result;
  }
  //상품등록
  public function productRegist($goodsName,$goodsOrigin,$mainGroup,$subGroup,
                                $mainfile,$subfile,$goodsPrice,$goodsNumber){

    $mainFilePath = Library::fileUpload($mainfile,"./goodsImage/mainPhoto");
    $subFilePath = Library::filesUpload($subfile,"./goodsImage/subPhoto");
    $mainFilePath = ".".$mainFilePath;
    $subFilePath  = ".".$subFilePath;
    $date = new DateTime();
    $sql = "insert into product values('',:goodsName,:goodsOrigin,:mainGroup,:subGroup,:mainfile,:subfile,:goodsPrice,:goodsNumber,:goodsRegist,:visitNumber)";
    $this->execute($sql,array(
      ":goodsName"=>$goodsName,
      ":goodsOrigin"=>$goodsOrigin,
      ":mainGroup"=>$mainGroup,
      ":subGroup"=>$subGroup,
      ":mainfile"=>$mainFilePath,
      ":subfile"=>$subFilePath,
      ":goodsPrice"=>$goodsPrice,
      ":goodsNumber"=>$goodsNumber,
      ":goodsRegist"=>$date->format('Y-m-d'),
      ":visitNumber"=>0
    ));
   }
}
 ?>
