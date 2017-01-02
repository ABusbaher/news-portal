
<nav id="glavna-nav" class="navbar navbar-inverse">
  <div class="container-fluid" id="nav">
    <div class="navbar-header" id="logo">
      <a class="navbar-brand" href="index.php#/">News portal</a>
    </div>
    <?php
    $kategorije = Category::get_all();
    foreach ($kategorije as $kat){
    ?>
    <ul class="nav navbar-nav">
     <?php echo "<li><a href='page.php?id=" . $kat->kategorija_id . "'>" . $kat->naziv . "</li></a>";
     ?>
    </ul>
    <?php } ?>
    <ul class="nav navbar-nav navbar-right">
    <?php
     Session::check_the_login_nav($str="logout.php");
    ?>
    </ul>
  </div>
</nav>