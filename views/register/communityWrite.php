<form name="community_form" action="<?php print $base_url?>/community/save" method="post" enctype="multipart/form-data">
  <input type="hidden" name="mode" value="write">
  <input type="hidden" name="_token" value="<?php print $this->escape($_token);?>">
  <table border="1">
    <tr>
      <td >글제목</td>
      <td><input type="text" name="title" value=""></td>
    </tr>
    <tr>
      <td >글비번</td>
      <td><input type="password" name="passwd" value=""></td>
    </tr>
    <tr>
      <td>파일업로드</td>
      <td>
        <input type="file" name="upfile[]"  value="" multiple="multiple">
      </td>
    </tr>
    <tr>
      <td>글내용</td>
      <td colspan="3"><textarea name="content" value=""></textarea></td>
    </tr>
  </table>
</form>
<table>
  <tr>
    <td colspan="2">
      <button onclick="check_input()">글작성</button>
      <a href="<?php print $base_url?>/community"><input type="button" value="뒤로가기" ></a>
    </td>
</tr>
</table>
<script src='/js/communityWrite.js'></script>
