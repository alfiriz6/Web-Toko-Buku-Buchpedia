<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Buchpedia</title>

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

    <div class="heading">
    </div>

    <section class="about">
        <div class="flex">
            <div class="image">
                <img src="img/about-img.jpg" alt="">
            </div>

            <div class="content">
                <h3>tentang kami</h3>
                <p>Buchpedia adalah toko buku online di Indonesia yang menyediakan aneka buku berkualitas.</p>
                <p>Kenyamanan dan kepuasan para pelanggan merupakan prioritas kami. Kami ingin memberikan pengalaman yang lebih kepada para pelanggan di saat pelanggan melakukan proses pembelanjaan online. Memberikan pelayanan yang terbaik menjadi tujuan kami dengan dukungan manajemen yang proaktif dan kreatif.</p>
            </div>
        </div>
    </section>

    <section class="reviews">
        <h1 class="title">ulasan pelanggan</h1>

        <div class="box-container">
            <div class="box">
                <img src="img/pic-1.png" alt="">
                <p>Books are a uniquely portable magic.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h3>Benedict Cumberbatch</h3>
            </div>

            <div class="box">
                <img src="img/pic-2.png" alt="">
                <p>Without books, science crippled.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h3>Robert Downey Jr.</h3>
            </div>

            <div class="box">
                <img src="img/pic-3.png" alt="">
                <p>A writer only begins a book. A reader finishes it.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h3>Stan Lee</h3>
            </div>
        </div>
    </section>

    <section class="authors">
        <h1 class="title">penulis</h1>

        <div class="box-container">
            <div class="box">
                <img src="img/author-1.jpg" alt="">
                <div class="share">
                    <a href="https://web.facebook.com/n5menara" class="fab fa-facebook-f"></a>
                    <a href="https://twitter.com/fuadi1" class="fab fa-twitter"></a>
                    <a href="https://www.instagram.com/afuadi" class="fab fa-instagram"></a>
                    <a href="https://id.linkedin.com/in/ahmadfuadi" class="fab fa-linkedin"></a>
                </div>
                <h3>Ahmad Fuadi</h3>
            </div>

            <div class="box">
                <img src="img/author-2.jpg" alt="">
                <h3>Albert Einstein</h3>
            </div>

            <div class="box">
                <img src="img/author-3.jpg" alt="">
                <h3>B. J. Habibie</h3>
            </div>

            <div class="box">
                <img src="img/author-4.jpg" alt="">
                <h3>Cindy Adams</h3>
            </div>

            <div class="box">
                <img src="img/author-5.jpg" alt="">
                <div class="share">
                    <a href="https://twitter.com/gregjamesbarton" class="fab fa-twitter"></a>
                    <a href="https://au.linkedin.com/in/greg-barton-24b7b932" class="fab fa-linkedin"></a>
                </div>
                <h3>Greg Barton</h3>
            </div>

            <div class="box">
                <img src="img/author-6.jpg" alt="">
                <div class="share">
                    <a href="https://twitter.com/profmdwhite" class="fab fa-twitter"></a>
                    <a href="https://www.instagram.com/profmdwhite/" class="fab fa-instagram"></a>
                </div>
                <h3>Mark D. White</h3>
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