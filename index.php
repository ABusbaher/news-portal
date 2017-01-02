<?php
include_once "inc/head_index.php";
?>
<body>
<?php
include_once "inc/nav.php";
Session::is_admin();
 ?>
<div class="main">
<div class="container">
<div id="slider1" class="col-md-7">
<h2>TOP VESTI</h2>
<div class="callbacks_container">
  <ul class="rslides" id="slider3">
  <?php
  $sport_top = Article::get(51);
  $zabava_top = Article::get(7);
  $politika_top = Article::get(3); 
  ?>
      <li><a href="single_page.php?id=<?php echo $sport_top->id_vest; ?>"><img src="images/<?php echo  $sport_top->slika ?>" alt="">
      <p class="caption"><?php echo  $sport_top->naslov ?></p></a>
      </li>
      <li><a href="single_page.php?id=<?php echo $zabava_top->id_vest; ?>"><img src="images/<?php echo  $zabava_top->slika ?>" alt="">
      <p class="caption"><?php echo  $zabava_top->naslov ?></p></a>
      </li>
      <li><a href="single_page.php?id=<?php echo $politika_top->id_vest; ?>"><img src="images/<?php echo  $politika_top->slika ?>" alt="">
      <p class="caption"><?php echo  $politika_top->naslov ?></p></a>
      </li>
  </ul>
  
  <ul id="slider3-pager">
      <li><a href="#"><img src="images/<?php echo  $sport_top->slika ?>" alt=""></a></li>
      <li><a href="#"><img src="images/<?php echo  $zabava_top->slika ?>" alt=""></a></li>
      <li><a href="#"><img src="images/<?php echo  $politika_top->slika ?>" alt=""></a></li>
</ul>
</div>
</div>
<!--------OVO JE KRAJ SLAJDERA -------->
<div id="kom" class="col-md-5">
  
  <h3>Najviše komentara</h3>
  <div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#tab1">SPORT</a></li>
        <li><a href="#tab2">POLITIKA</a></li>
        <li><a href="#tab3">ZABAVA</a></li>
    </ul>
 
    <div class="tab-content">
        <div id="tab1" class="tab active">
            <ul class="gore-dole">
            <?php
              $s_news = Join_tables::the_most_comments($category=1);
              foreach ($s_news as $s_n) {
            ?> 
                <li><a href="single_page.php?id=<?php echo $s_n->id_vest; ?>"><?php echo $s_n->naslov; ?></a><br><i>br komentara:<?php echo $s_n->br_komentara ?></i></li>
                <?php } ?>
            </ul>
        </div>
 
        <div id="tab2" class="tab">
            <ul class="gore-dole">
            <?php
              $p_news = Join_tables::the_most_comments($category=2);
              foreach ($p_news as $p_n) {
            ?> 
                <li><a href="single_page.php?id=<?php echo $p_n->id_vest; ?>"><?php echo $p_n->naslov; ?></a><br><i>br komentara:<?php echo $p_n->br_komentara ?></i></li>
                <?php } ?>
            </ul>
        </div>
 
        <div id="tab3" class="tab">
            <ul class="gore-dole">
             <?php
              $z_news = Join_tables::the_most_comments($category=3);
              foreach ($z_news as $z_n) {
            ?> 
                <li><a href="single_page.php?id=<?php echo $z_n->id_vest; ?>"><?php echo $z_n->naslov; ?></a><br><i>br komentara:<?php echo $z_n->br_komentara ?></i></li>
                <?php } ?>
            </ul>
        </div>
 
    </div>
</div>
</div>
<!--------OVO JE KRAJ ZA NAJVIŠE KOMENTARA -------->

 </div>
 <div class="container">
  <div id="slide2" class="col-md-6">
<h3>Ostale vesti</h3>
<div class="tabss">
<?php
  $sport_ostalo = Article::get(2);
  $zabava_ostalo = Article::get(50);
  $politika_ostalo = Article::get(4); 
 ?>
  <nav>
    <a><?php echo $sport_ostalo->naslov; ?></a>
    <a><?php echo $zabava_ostalo->naslov; ?></a>
    <a><?php echo $politika_ostalo->naslov; ?></a>
  </nav>
  <div class="content">
    <a href="single_page.php?id=<?php echo $sport_ostalo->id_vest; ?>">
    <img class="img-responsive" src="images/<?php echo $sport_ostalo->slika; ?>" alt="">
    </a>
  </div>
  <div class="content">
    <a href="single_page.php?id=<?php echo $zabava_ostalo->id_vest; ?>">
    <img class="img-responsive" src="images/<?php echo $zabava_ostalo->slika; ?>" alt="">
    </a>
  </div>
  <div class="content">
    <a href="single_page.php?id=<?php echo $politika_ostalo->id_vest; ?>">
    <img class="img-responsive" src="images/<?php echo $politika_ostalo->slika; ?>" alt="">
    </a>
  </div>
</div>
  
  </div>
   
<!--------OVO JE KRAJ ZA DRUGOG SLAJDERA -------->
  <div id="kom2" class="col-md-5">
  
  <h3>NAJNOVIJE VESTI</h3>
  <div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#tab1">SPORT</a></li>
        <li><a href="#tab2">POLITIKA</a></li>
        <li><a href="#tab3">ZABAVA</a></li>
    </ul>
 
    <div class="tab-content">
        <div id="tab1" class="tab active">
            <ul class="gore-dole">
            <?php
              $s_vesti = Article::get_order($id=1,$limit=3);
              foreach ($s_vesti as $s_vest){
            ?> 
                <li><a href="single_page.php?id=<?php echo $s_vest->id_vest; ?>"><?php echo $s_vest->naslov;?></a><br><i> <?php echo $s_vest->vreme_objave; ?></i></li>
                <?php }?>
            </ul>
        </div>
 
        <div id="tab2" class="tab">
            <ul class="gore-dole">
             <?php
              $p_vesti = Article::get_order($id=2,$limit=3);
              foreach ($p_vesti as $p_vest){
            ?> 
                <li><a href="single_page.php?id=<?php echo $p_vest->id_vest; ?>"><?php echo $p_vest->naslov; ?></a><br><i> <?php echo $p_vest->vreme_objave; ?></i></li>
                <?php }?>
            </ul>
        </div>
 
        <div id="tab3" class="tab">
            <ul class="gore-dole">
             <?php
              $z_vesti = Article::get_order($id=3,$limit=3);
              foreach ($z_vesti as $z_vest){
            ?> 
                <li><a href="single_page.php?id=<?php echo $z_vest->id_vest; ?>"><?php echo $z_vest->naslov; ?></a><br><i> <?php echo $z_vest->vreme_objave; ?></i></li>
                <?php }?>
            </ul>
        </div>
 
    </div>
</div>
  
  </div>
 </div>
 </div>
 <!--------OVO JE KRAJ ZA NAJNOVIJE VESTI -------->
<?php
include_once "inc/footer.php";
?>

</body>
</html>
