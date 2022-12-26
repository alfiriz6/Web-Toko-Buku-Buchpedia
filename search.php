<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
   header('location:login.php');
};

if (isset($_POST['add_to_cart'])) {
   $book_name = $_POST['book_name'];
   $book_price = $_POST['book_price'];
   $book_image = $_POST['book_image'];
   $book_quantity = $_POST['book_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$book_name' AND user_id = '$user_id'") or die('query failed');
   if (mysqli_num_rows($check_cart_numbers) > 0) {
      $message[] = 'Sudah ada di tas';
   } else {
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$book_name', '$book_price', '$book_quantity', '$book_image')") or die('query failed');
      $message[] = 'Buku ditambahkan ke tas';
   }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Halaman Pencarian | Buchpedia</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <link rel="icon" href="img/favicon.ico">
</head>

<body>
   <?php
   include 'header.php';
   ?>

   <div class="heading">
   </div>

   <section class="search-form">
      <form action="" method="post">
         <input type="text" name="search" placeholder="Cari Judul Buku" class="box" id=search>
         <input type="submit" name="submit" value="Cari" class="btn">
      </form>
   </section>

   <section class="books" style="padding-top: 0;">
      <div class="box-container">
         <?php
         if (isset($_POST['submit'])) {
            $search_item = $_POST['search'];
            $select_books = mysqli_query($conn, "SELECT * FROM `books` WHERE name LIKE '%{$search_item}%'") or die('query failed');
            if (mysqli_num_rows($select_books) > 0) {
               while ($fetch_book = mysqli_fetch_assoc($select_books)) {
         ?>
                  <form action="" method="post" class="box">
                     <img src="uploaded_img/<?php echo $fetch_book['image']; ?>" alt="" class="image">
                     <div class="name"><?php echo $fetch_book['name']; ?></div>
                     <div class="price">Rp <?php echo $fetch_book['price']; ?></div>
                     <input type="number" class="qty" name="book_quantity" min="1" value="1">
                     <input type="hidden" name="book_name" value="<?php echo $fetch_book['name']; ?>">
                     <input type="hidden" name="book_price" value="<?php echo $fetch_book['price']; ?>">
                     <input type="hidden" name="book_image" value="<?php echo $fetch_book['image']; ?>">
                     <input type="submit" class="btn" value="Tambahkan ke Tas" name="add_to_cart">
                  </form>
         <?php
               }
            } else {
               echo '<p class="empty">Tidak ada hasil yang ditemukan</p>';
            }
         } else {
            echo '<p class="empty">Silakan cari judul buku</p>';
         }
         ?>
      </div>
   </section>

   <?php
   include 'footer.php';
   ?>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>
</body>

</html>