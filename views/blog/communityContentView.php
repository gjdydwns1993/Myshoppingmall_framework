<link rel="stylesheet" href="/css/communityContentsView.css">
<table border="1">
  <tr><td>제목</td><td><?php print $result['b_title']?></td></tr>
  <tr><td>글쓴이</td><td><?php print $result['b_id']?></td></tr>
  <tr><td>파일다운로드</td><td><a href='<?php print $base_url?>/fileDownload/<?php print $result['b_no']?>'><?php print $result['b_fileName']?></a></td></tr>
  <tr><td colspan='2'>글내용</td></tr>
  <tr><td colspan='2'><?php print $result['b_content']?></td></tr>
</table>
<div id='div'><button id='button' onclick="check_input()">삭제</button></div>
<form action='<?php print $base_url?>' method='post' name='passwd_form'>
  <input type='hidden' name='mode' value='delete'>
</form>
</section>
<script src='/js/communityContents.js'></script>
