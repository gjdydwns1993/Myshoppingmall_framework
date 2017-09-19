<?php
class HistoryModel extends ExecuteModel{

  //구입시 구입목록 저장
  public function saveBuyProduct($id,$goodsName,$goodsPrice){
    $date = new DateTime();
    $sql = "insert into history values('',:id,:goodsName,:goodsPrice,:buyRegistDay)";
    $this->execute($sql,array(
      ":id"=>$id,
      ":goodsName"=>$goodsName,
      ":goodsPrice"=>$goodsPrice,
      ":buyRegistDay"=>$date->format('Y-m-d')
    ));
  }
}
 ?>
