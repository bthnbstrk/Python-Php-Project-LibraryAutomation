<?php
include  'netting/baglan.php';
error_reporting(0);
?>

    <!DOCTYPE html>
    <html lang="tr">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>My Library is My World</title>

        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/all.min.css" rel="stylesheet" type="text/css">
        <link href="css/agency.css" rel="stylesheet">


        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>


    </head>



<body id="page-top">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php" style="color: cornflowerblue">My Library is My World</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>

    </div>
</nav>


<header class="masthead">
    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in"></div><br><br>
            <div class="intro-heading text-uppercase" style="color: floralwhite;"><h1>My Library</h1></div>
            <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Books</a><br><br>
            <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="AddBookPicture.php" target="_blank">Add PIcture of Books</a>
        </div>
    </div>
</header>



<section class="page-section" id="services">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Books in My Library</h2>

            </div>
        </div>
        <div class="row text-center">
            <?php
            $iceriksor=$db->prepare("select * from books");
            $iceriksor->execute();
            while( $icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="col-md-4">
                    <img src="<?php echo $icerikcek['book_photo']; ?>"  alt="<?php  echo $icerikcek['product_name']; ?>" width="300" height="300" alt=""  />
                    <h4 class="service-heading">
                        <?php  echo    $icerikcek['book_name']   ?>
                    </h4>

                    <ul class="list-unstyled">
                        <li><?php  echo $icerikcek['product_pro1']; ?></li>
                        <li>ISBN:<?php  echo $icerikcek['book_isbn']; ?></li>
                        <li><?php  echo $icerikcek['book_author']; ?></li><br>
                    </ul><br>
                </div>
            <?php } ?>

        </div>
    </div>
</section>





<br><br><br><br>







<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Contact form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Custom scripts for this template -->
<script src="js/agency.min.js"></script>

</body>
</html>
