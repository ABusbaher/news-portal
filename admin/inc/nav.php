<nav id="glavna-nav" class="navbar navbar-inverse">
  <div class="container-fluid" id="nav">
    <div class="navbar-header" id="logo">
      <a class="navbar-brand" href="main.php">News</a>
    </div>
    <ul class="nav navbar-nav">
     <li><a href='users.php'>Users</li></a>;
     <li><a href='admin_comments.php'>Comments</li></a>;
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php
     Session::not_admin();
     Session::check_the_login_nav($str="../logout.php");
    ?>
    </ul>
  </div>
</nav>