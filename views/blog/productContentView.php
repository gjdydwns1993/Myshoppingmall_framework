<link rel="stylesheet" href="/css/goodsContentsView.css">
<div id='goodsImg'><img src="/<?php print $result['mainPhoto']?>" alt="" width="400" height="400"></div>
<table border='1'>
  <tr><td>상품조회수</td><td><?php print $result['visitNumber']?></td></tr>
  <tr><td>상품명</td><td><?php print $result['goodsName']?></td></tr>
  <tr><td>원산지</td><td><?php print $result['goodsOrigin']?></td></tr>
  <tr><td>판매가</td><td><?php print $result['goodsPrice']?></td></tr>
  <tr><td>수량</td><td><?php print $result['goodsNumber']?></td></tr>
  <tr><td>배송방법</td><td>택배</td></tr>
  <tr><td>배송비</td><td>3000원</td></tr>
  <tr><td>택배비</td><td>3000원</td></tr>
  <tr><td>결제수단</td><td>무통장 입금,카드 결제,적립금,실시간 계좌이체</td></tr>
  <tr>
    <td>
      <form action='<?php print $base_url?>/product/buy' method='post'>
        <input type='hidden' name='b_goodsName' value='<?php print $result['goodsName']?>'>
        <input type='hidden' name='b_goodsPrice' value='<?php print $result['goodsPrice']?>'>
        <input type='hidden' name='b_no' value='<?php print $result['b_no']?>'>
        <input type="hidden" name="_token" value="<?php print $this->escape($_token);?>">

        <input type='submit' value='구매하기' id='button'>
      </form>
      <form action=''method='post' id='delete_form'>
       <input type='hidden' name='mode' value='delete'>
       <input type='hidden' name='b_no' value=''>
      </form>
    </td>
  </tr>
</table>
<ul>
  <li><a href='<?php print $base_url?>/productContent/detail/<?php print $result['b_no']?>'>상품상세정보</a></li>
  <li><a href='<?php print $base_url?>/productContent/exchanege/<?php print $result['b_no']?>'>교환/환불안내</a></li>
</ul>
<script type="goodsContents.js"></script>
<?php print $this->render($additionalDir,array("subPhoto"=>$subPhoto)) ?>
