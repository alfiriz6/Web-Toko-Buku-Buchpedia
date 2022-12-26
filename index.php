<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Buchpedia</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <link rel="icon" href="img/favicon.ico">
</head>

<body>
   <?php
   include 'index_header.php';
   ?>

   <div class="home"></div>

   <section class="books">
      <h1 class="title">buku terbaru</h1>

      <div class="box-container">
         <?php
         $select_books = mysqli_query($conn, "SELECT * FROM `books` LIMIT 6") or die('query failed');
         if (mysqli_num_rows($select_books) > 0) {
            while ($fetch_books = mysqli_fetch_assoc($select_books)) {
         ?>
               <form action="" method="post" class="box">
                  <img class="image" src="uploaded_img/<?php echo $fetch_books['image']; ?>" alt="">
                  <div class="name"><?php echo $fetch_books['name']; ?></div>
                  <div class="price">Rp <?php echo $fetch_books['price']; ?></div>
                  <input type="hidden" name="book_name" value="<?php echo $fetch_books['name']; ?>">
                  <input type="hidden" name="book_price" value="<?php echo $fetch_books['price']; ?>">
                  <input type="hidden" name="book_image" value="<?php echo $fetch_books['image']; ?>">
               </form>
         <?php
            }
         } else {
            echo '<p class="empty">Belum ada buku yang ditambahkan</p>';
         }
         ?>
      </div>

      <div class="load-more" style="margin-top: 2rem; text-align:center">
         <a href="login.php" class="option-btn">muat lebih banyak</a>
      </div>
   </section>

   <section class="about">
      <div class="flex">
         <div class="image">
            <img src="img/home-about-img.jpg" alt="">
         </div>

         <div class="content">
            <h3>tentang kami</h3>
            <p>Buchpedia adalah toko buku online di Indonesia yang menyediakan aneka buku berkualitas.</p>
            <a href="index_about.php" class="btn">Baca Selengkapnya</a>
         </div>
      </div>
   </section>

   <?php
   include 'index_footer.php';
   ?>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>
</body>

</html>