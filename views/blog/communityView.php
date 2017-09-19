<link rel="stylesheet" href="/css/goodsView.css">
<link rel="stylesheet" href="/css/community.css">
<div id='writeDiv'><a href="<?php print $base_url?>/communityWrite">글쓰기</a></div>
  <div>
    <hr>
    <table>
      <tr>
        <td>글번호</td>
        <td>글제목</td>
        <td>등록일</td>
        <td>조회수</td>
      </tr>
     <?php foreach($result as $key): ?>
      <tr>
        <td><?php print $key['b_no'] ?></td>
        <td><a href='<?php print $base_url?>/communityContent/<?php print $key['b_no']?>'><?php print $key['b_title'] ?></a></td>
        <td><?php print $key['b_regist_day'] ?></td>
        <td><?php print $key['visitNumber'] ?></td>
      </tr>
     <?php endforeach; ?>
    </table>
    <hr>
  </div>
<div id="pageNumber">
<?php foreach($pageNumbers as $value): ?>
<a href="<?php echo $base_url.'/community/page/'.$value?>"><?php echo $value ?></a>
<?php endforeach; ?>
</div>
