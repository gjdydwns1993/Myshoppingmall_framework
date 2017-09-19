<link rel="stylesheet" href="/css/goodsView.css">
<?php foreach($product as $key): ?>
<a href="<?php print $base_url;?>/productContent/detail/<?php print $key['b_no'];?>">
  <div id='goodsDiv'>
    <div id='goodsImg'><img src="/<?php print $key['mainPhoto']?>" width="300" height="200"></div>
    <div id='goodsName'><?php echo $key['b_no']?></div>
    <div id='goodsPrice'><?php echo $key['goodsName'] ?></div>
    <div id='goodsPrice'><?php echo $key['goodsPrice'] ?></div>
  </div>
</a>
<?php endforeach; ?>
<div id="pageNumber">
<?php foreach($pageNumbers as $value): ?>
<a href="<?php echo $base_url.'/product/page/'.$key['mainGroup'].'/'.$value?>"><?php echo $value ?></a>
<?php endforeach; ?>
</div>
