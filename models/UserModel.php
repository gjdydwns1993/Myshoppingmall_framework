<?php
class UserModel extends ExecuteModel{

  //유저정보 가져오기
  public function getUserRecord($pId){
    $sql = "select b_id,b_passwd from member
            where b_id=:id";
    //결과값
    $userData = $this->getRecord(
      $sql,
      array(':id'=>$pId)
    );
    return $userData;
  }
  //회원가입
  public function membership($id,$passwd,$name,$nick,$sex,$phone,$address){
    $sql = "insert into member(b_id,b_passwd,b_name,b_nick,b_sex,b_phone_number,b_regist_day,b_address)
            values(:id,:passwd,:name,:nick,:sex,:phone,:regist,:address)";
    $date = new DateTime();
    $stmt = $this->execute($sql,array(
      ":id"=>$id,
      ":passwd"=>$passwd,
      ":name"=>$name,
      ":nick"=>$nick,
      ":sex"=>$sex,
      ":phone"=>$phone,
      ":regist"=>$date->format('Y-m-d'),
      ":address"=>$address
    ));
  }
}
 ?>
