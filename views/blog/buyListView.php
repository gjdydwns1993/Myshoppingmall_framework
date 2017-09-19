<link rel="stylesheet" href="/css/goodsView.css">
<link rel="stylesheet" href="/css/history.css">
<hr>
<table>
  <tr class='tr'><td>구매자</td><td>구매목록</td><td>가격</td><td>구매날짜</td></tr>
  <?php foreach($result as $key): ?>
  <tr>
    <td><?php print $key['b_id'] ?></td>
    <td><?php print $key['goodsName'] ?></td>
    <td><?php print $key['goodsPrice'] ?></td>
    <td><?php print $key['buy_regist_day'] ?></td>
  </tr>
  <?php endforeach; ?>
</table>
<hr>
<div id="pageNumber">
<?php foreach($pageNumbers as $value): ?>
<a href="<?php echo $base_url.'/buyList/page/'.$value?>"><?php echo $value ?></a>
<?php endforeach; ?>
</div>
