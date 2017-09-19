<?php
class Loader{
  protected $_directories = array();//autoload대상 Directory를 저장하는 property

  public function regDirectory($dir){
    $this->_directories[] = $dir;
    //array_push($$this->_directories,$dir);
    //http://php.net/manual/kr/function.array-push.php
  }
  public function register(){
    //spl_autoload_register(callback())
    //==> register()메서드를 실행하면 spl_autoload_register가 실행되는대
    //여기서 callback메서드인 현재객체의 requireClsFile() 을 통해 자동으로 require
    //시켜준다
    //array($this,'requireClsFile'') ==> $this의 requireClsFile메서드를 실행함
    spl_autoload_register(array($this,'requireClsFile'));
    //http://php.net/manual/kr/function.spl-autoload-register.php
  }
  /**************************************
  이름 : function requireClsFile
  역활 : 등록된 디렉토리들($_directories)를 하나씩 $file이란 변수에 담고
         $file = 디렉토리/클레스.php
         is_readable($file) 실행
         require $file 실행
  **************************************/
  public function requireClsFile($class){
    foreach($this->_directories as $dir){
      $file = $dir .'/'.$class.'.php';
      if(is_readable($file)){
        //http://php.net/manual/kr/function.is-readable.php
        require $file;
        return;
      }
    }
  }
}
 ?>
