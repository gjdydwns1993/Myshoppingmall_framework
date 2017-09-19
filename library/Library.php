<?php
final class Library{

  /*==========================================================================
  //function name : fileUpload('parameter1','parameter2','parameter3')
  //parameter : input태그 name(parameter1) , 올라갈파일경로(prameter2) , 올라간파일경로(parameter3)
  //explanation : parameter로 file업로드 할때 name값을 받아서 단일 파일 업로드 실행
  //return type : String(업로드된 경로)
  ============================================================================*/
  public static function fileUpload($pName,$pFile_path){
    $rFile_path="";
    $fileName = $_FILES[$pName]['name'];
    $file_path = $pFile_path."/".$fileName;
    $file_tmp = $_FILES[$pName]['tmp_name'];
    if(move_uploaded_file($file_tmp,$file_path)){
      $rFile_dr = $pFile_path."/";
      $rFile_name = $fileName;
      $rFile_path = $rFile_dr.$rFile_name;
    }
    return $rFile_path;
  }
  /*==========================================================================
  //function name : filesUpload('parameter1','parameter2','parameter3')
  //parameter : input태그 name(parameter1) , 올라갈파일경로(prameter2) , 올라간파일경로(parameter3)
  //explanation : parameter로 file업로드 할때 name값을 받아서 다중파일 업로드 실행
  //return type : String(업로드된 경로)
  ============================================================================*/
  public static function filesUpload($pName,$pFile_path){
    foreach($_FILES[$pName]['name'] as $key=>$value){
      $file_path[] = $pFile_path."/".$value;
      $file_name[] = $value;
    }
    foreach($_FILES[$pName]['tmp_name'] as $key=>$value){ $file_tmp[] = $value; }
    for($i=0;$i<count($file_path);$i++){
      if(move_uploaded_file($file_tmp[$i],$file_path[$i])){
        $rFile_dr = $pFile_path."/";
        $rFile_name = $file_name[$i];
        $rFile_path[] = $rFile_dr.$rFile_name;
      }
    }
    $rFile_paths = self::stringSum($rFile_path);
    return $rFile_paths;
  }

  /*===================================================================
  //function name : stringSum()
  //parameter : 배열
  //explanation : parameter로 배열을 받아서  배열인덱스의 값을 문자열로 합친다
  //return type : String
  =====================================================================*/
  public static function stringSum($pArray){
    $stringSum="";
    for($i=0;$i<count($pArray);$i++){
      if($i==0) $stringSum .= $pArray[$i];
      else $stringSum .= "*".$pArray[$i];
    }
    return $stringSum;
  }
}
 ?>
