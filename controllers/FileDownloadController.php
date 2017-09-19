<?php
/*===================================================================
//pageName : fileDownload.php
//explanation : 자유게시판에서 첨부파일다운드를 눌렀을때
//variable:
//$b_no : 해당 게시글 번호
//$file_dir : 해당 파일 경로
//$fileName : 해당 파일 이름
=====================================================================*/
class fileDownloadController extends Controller{
  //다운로드
  public function downAction(){
    $requestUri = $this->_request->getRequestUri();
    $arr = explode("/",$requestUri);
    $bno = $arr[3];
    if(!$this->_session->isAuthenticated()){
      return $this->redirect('/communityContent'.'/'.$bno);
    }
    $result = $this->_connect_model->get('FileDownload')->fileDownload($bno);
    $real_name = $result['b_fileName'];
    $file_path = "./upfile/".$real_name;

    header("Pragma: public");
    //응답의 정보를 캐시 할수 있습니다.
    //좀더 정교한 캐시컨트롤을 위해 별도의 지시자가 추가되었으므로, pragama는 사용하지 않는 것이 좋지만,
    //1.0과의 하위 호환성을 위해 남아있음.
    //인증이 된 상태더라도 캐시하도록 하는것
    //private 특정 브라우저만 캐쉬하도록 설정.
    header("Expires: 0");
    //http date 형태로 날짜를 지정하며 로컬타임이 아닌 gmt를 사용
    //규칙적인 시간간격으로 컨텐츠가 바뀔때 유용하다.
    //단순히 캐시에 응답이 오래된 것을 전하기 위해 캐시된 복사본을 사용하기 전에 응담를 재검증해야한다.
    //만료를 추가
    header("Content-Type: application/octet-stream");
    //확장자 지정, 확장자가 없을 경우에 사용
    header("Content-Disposition: attachment; filename=\"$real_name\"");
    //송신 설명 파일 - 헤더정보를 첨부파일 및 파일 이름
    header("Content-Transfer-Encoding: binary");
    //mime(다목적 인터넷 우편 확장 표준)규격 - 헤더 에서 우편물 유형, 사용된 문자세트 및 인코딩 방슥 등의 정보를 가짐
    // 전송 내용물 인코딩을 할때 binary는 인코딩을 하지 않는 방식 한라인에 1000문자를 넘지 못하도록 규정하고 있는데,
    // binary 방식에서는 길이에 제약이 없고, 인코딩을 하지 않음.
    header("Content-Length: ".filesize($file_path));
    //송신 지정한 파일 크기 정보 단위-바이트


    //버퍼 이동하고자 하는 데이터를 담고있다.
    //다른장치로 데이터를 전송할 경우에 양자간의 데이터의 전송속도나 처리속도의 차를 보상하여
    //양호하게 결합할 목적으로 사용하는 기억영역을 버퍼라한다.
    ob_clean();   //출력없이 버퍼만 지우고, 종료하지는 않습니다.
    //출력 버퍼의 모든 내용을 버립니다. 출력버퍼를 파괴하지는 않습니다.
    flush();   //php의 백엔드에 관계없이 출력 버퍼를 비웁니다.
    //사실상 모든 출력을 사용자 브라우저에 보냅니다.
    readfile($file_path);
    //파일을 출력합니다. 파일을 읽고 출력버퍼에 기록합니다.
    //반환값으로 파일에서 읽은 바이트수를 반환
    //파일의 모든 데이터를 읽어서 표준출력으로 내보낸다. 파일을 닫음

  }
}

?>
