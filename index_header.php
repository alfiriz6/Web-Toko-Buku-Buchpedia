<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">
   <div class="header-1">
      <div class="flex">
         <a href="index.php" class="logo">
            <img src="img/logo-img.png" alt="">
         </a>

         <nav class="navbar">
            <a href="index.php">Beranda</a>
            <a href="index_about.php">Tentang</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
         </div>

         <div class="user-box">
            <p>Silakan login terlebih dahulu</p>
            <a href="login.php" class="btn">Login</a>
         </div>
      </div>
   </div>
</header>