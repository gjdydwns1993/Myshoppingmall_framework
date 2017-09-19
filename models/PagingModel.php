<?php
class PagingModel extends ExecuteModel{

  //페이징
  public function getPageNumbers($pTableName,$pActionName=null){
    if($pActionName==null){//커뮤니티 게시판
      $sql = "select * from ".$pTableName;
      $stmt = $this->execute($sql);
    }else{//상품정보,구매목록
      $sql = "select * from ".$pTableName." where mainGroup=:actionName";
      $stmt = $this->execute($sql,array(
        ":actionName"=>$pActionName
      ));
    }
    $row = $stmt->rowCount();
    if($row==0){   return "";  }
    else{
      //8의배수일때
      if($row%8==0){
        for($i=0;$i<$row/8;$i++){
          $array[] = $i+1;
        }
        return $array;
      }else{
        //8보다 작을때
        if($row<8){
           $array[] = 1;
          return $array;
        }else{ //8보다 클때
          for($i=0;$i<floor($row/8)+1;$i++){
            $array[] = $i+1;
          }
          return $array;
        }//end else
      }//end else
    }//end else
  }//enf function getPageNumbers
}
 ?>
