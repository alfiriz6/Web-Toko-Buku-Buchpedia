<?php
include '../config.php';
$search_item = $_GET['search'];
$select_books = mysqli_query($conn, "SELECT * FROM `books` WHERE name LIKE '%{$search_item}%'") or die('query failed');
if (mysqli_num_rows($select_books) > 0) {
    while ($fetch_book = mysqli_fetch_assoc($select_books)) {
?>
        <form action="" method="post" class="box">
            <img src="uploaded_img/<?php echo $fetch_book['image']; ?>" alt="" class="image">
            <div class="name">
                <?php echo $fetch_book['name']; ?>
            </div>
            <div class="price">
                Rp <?php echo $fetch_book['price']; ?>
            </div>
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
?>