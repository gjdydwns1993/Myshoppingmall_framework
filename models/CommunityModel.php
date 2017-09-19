<?php
require_once "../library/Library.php";
class CommunityModel extends ExecuteModel{

  //게시글 볼때 조회수 증가
  public function adjustVisitNumber($vNum,$pBno){
    $sql = "update community set visitNumber=:visitNum where b_no=:bno";
    $this->execute($sql,array(
      ":visitNum"=>$vNum+1,
      ":bno"=>$pBno
    ));
  }
  //게시글 전체
  public function getCommunity($pPageNumber=null){
    if($pPageNumber!=null){
      $offsetNum = ($pPageNumber-1)*8;
      $sql = "select * from community
              order by b_no desc limit 8 offset ".$offsetNum;
    }else{
      $sql = "select * from community
              order by b_no desc limit 8 offset 0";
    }
    $result = $this->getAllRecord($sql);
    return $result;
  }
  //게시글 내용
  public function getContent($pBno){
    $sql = "select * from community where b_no=:bno";
    $result = $this->getRecord($sql,array(
      ":bno"=>$pBno
    ));
    //조회수 증가
    $this->adjustVisitNumber($result['visitNumber'],$pBno);
    return $result;
  }
  //게시글 작성
  public function writeCommunity($pId,$pPasswd,$pTitle,$pContent,$pUpfile){
    if($_FILES['upfile']['size']['0']==0) $filePath = "";
    else {
      $filePath = Library::filesUpload($pUpfile,"./upfile");
      $filePath = ".".$filePath;
    }
    $date = new DateTime();
    $sql = "insert into community(b_id,b_passwd,b_title,b_content,b_filePath,b_fileName,b_regist_day,visitNumber)
            values(:id,:passwd,:title,:content,:filePath,:fileName,:regist_day,:visitNumber)";
    $stmt = $this->execute($sql,array(
      ":id"=>$pId,
      ":passwd"=>$pPasswd,
      ":title"=>$pTitle,
      ":content"=>$pContent,
      ":filePath"=>$filePath,
      ":fileName"=>substr($filePath,10),
      ":regist_day"=>$date->format('Y-m-d'),
      ":visitNumber"=>0
    ));
  }

}
 ?>
