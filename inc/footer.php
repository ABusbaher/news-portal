<footer class="footer-basic-centered">

      <p class="footer-links">
      <a  href="index.php#/">NEWS PORTAL</a> / 
        <?php
    $kategorije = Category::get_all();
    foreach ($kategorije as $kat){
    ?>
     <?php echo "<a href='page.php?id=" . $kat->kategorija_id . "'>" . $kat->naziv . "</a>  /";
     } ?>
      </p>

      <p class="footer-company-name">News portal &copy; 2016</p>

</footer>