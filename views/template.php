<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="/css/mainView.css">
  <script src='./js/jquery-3.1.1.min.js'></script>
</head>
<body>
  <div id='header1'>
    <?php
      if(isset($_SESSION['id'])){
        if($_SESSION['id']=="admin")print $this->render('firstHeaderView/admin');
        else print $this->render('firstHeaderView/user');
      }else{
        print $this->render('firstHeaderView/login');
      }
    ?>
  </div><!--end div id header1-->
  <div id='header2'><img src="/image/header.jpg" alt="쇼핑몰로고이미지"></div>
  <nav>
    <ul id='ul1'>
      <li class='oli'><a href="<?php print $base_url?>/product/nikes"><img src="/image/menu1.jpg" alt="메뉴1"></a></li>
      <li class='oli'><a href="<?php print $base_url?>/product/adidas"><img src="/image/menu2.jpg" alt="메뉴2"></a></li>
      <li class='oli'><a href="<?php print $base_url?>/product/others"><img src="/image/menu3.jpg" alt="메뉴3"></a></li>
      <li class='oli'><a href="<?php print $base_url?>/community"><img src="/image/menu4.jpg" alt="메뉴4"></a></li>
    </ul>
  </nav>

  <section>
    <?php print $_content;?>
  </section>
  
  <footer>(주)NBAShopping</footer>
</body>
</html>
