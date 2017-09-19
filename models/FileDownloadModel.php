<?php
class FileDownloadModel extends ExecuteModel{

  //파일 다운로드
  public function fileDownload($pBno){
    $sql = "select * from community where b_no=:bno";
    $result = $this->getRecord($sql,array(
      ":bno"=>$pBno
    ));

    return $result;
  }
}
 ?>
