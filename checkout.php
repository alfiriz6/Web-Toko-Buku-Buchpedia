<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
   header('location:login.php');
}

if (isset($_POST['order_btn'])) {
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, $_POST['street'] . ', ' . $_POST['subdistrict'] . ', ' . $_POST['district'] . ', ' . $_POST['city'] . ', ' . $_POST['province'] . ', ' . $_POST['postcode']);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_books[] = '';

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if (mysqli_num_rows($cart_query) > 0) {
      while ($cart_item = mysqli_fetch_assoc($cart_query)) {
         $cart_books[] = $cart_item['name'] . ' (' . $cart_item['quantity'] . ') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      }
   }

   $array_book = array();
   foreach ($cart_books as $val) {
      if ($val !== '') {
         array_push($array_book, $val);
      }
   }
   $total_books = implode(', ', $array_book);
   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_books = '$total_books' AND total_price = '$cart_total'") or die('query failed');

   if ($cart_total == 0) {
      $message[] = 'Tas belanjamu kosong';
   } else {
      if (mysqli_num_rows($order_query) > 0) {
         $message[] = 'Pesanan sudah ada';
      } else {
         mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_books, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_books', '$cart_total', '$placed_on')") or die('query failed');
         $message[] = 'Pesanan berhasil ditambahkan';
         mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout | Buchpedia</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <link rel="icon" href="img/favicon.ico">
</head>

<body>
   <?php include 'header.php'; ?>

   <div class="heading">
   </div>

   <section class="display-order">
      <h1 class="title">checkout</h1>

      <?php
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if (mysqli_num_rows($select_cart) > 0) {
         while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
      ?>
            <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo 'Rp ' . $fetch_cart['price'] . '' . ' x ' . $fetch_cart['quantity']; ?>)</span> </p>
      <?php
         }
      } else {
         echo '<p class="empty">Tas belanjamu kosong</p>';
      }
      ?>
      <div class="grand-total"> Total Biaya Belanja: <span>Rp <?php echo $grand_total; ?></span> </div>
   </section>

   <section class="checkout">
      <form action="" method="post">
         <h3>Pesanan Anda</h3>
         <div class="flex">
            <div class="inputBox">
               <span>Nama:</span>
               <input type="text" name="name" required placeholder="Masukkan nama Anda">
            </div>

            <div class="inputBox">
               <span>Nomor Telepon:</span>
               <input type="number" name="number" required placeholder="Masukkan nomor telepon Anda">
            </div>

            <div class="inputBox">
               <span>Email:</span>
               <input type="email" name="email" required placeholder="Masukkan email Anda">
            </div>

            <div class="inputBox">
               <span>Metode Pembayaran:</span>
               <select name="method">
                  <option value="Cash On Delivery">Cash On Delivery</option>
                  <option value="Kartu Kredit">Kartu Kredit</option>
                  <option value="Kartu Debit">Kartu Debit</option>
                  <option value="Dompet Digital">Dompet Digital</option>
               </select>
            </div>

            <div class="inputBox">
               <span>Alamat:</span>
               <input type="text" name="street" required placeholder="Masukkan alamat pengiriman">
            </div>

            <div class="inputBox">
               <span>Kelurahan/Desa:</span>
               <input type="text" name="subdistrict" required placeholder="Masukkan nama kelurahan/desa">
            </div>

            <div class="inputBox">
               <span>Kecamatan:</span>
               <input type="text" name="district" required placeholder="Masukkan nama kecamatan">
            </div>

            <div class="inputBox">
               <span>Kabupaten/Kota:</span>
               <input type="text" name="city" required placeholder="Masukkan nama kabupaten/kota">
            </div>

            <div class="inputBox">
               <span>Provinsi:</span>
               <input type="text" name="province" required placeholder="Masukkan nama provinsi">
            </div>

            <div class="inputBox">
               <span>Kode Pos:</span>
               <input type="number" min="0" name="postcode" required placeholder="Masukkan kode pos">
            </div>
         </div>
         <input type="submit" value="Pesan Sekarang" class="btn" name="order_btn">
      </form>
   </section>

   <?php
   include 'footer.php';
   ?>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>
</body>

</html>