<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>Gallery | Academic Excellence</title>
  <meta charset="UTF-8">
  <meta name="description" content="Gallery Page">
  <meta name="keywords" content="gallery, photos">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">



  <!-- Stylesheets -->
  <link rel="stylesheet" href="gallery/css/bootstrap.min.css" />
  <link rel="stylesheet" href="gallery/css/font-awesome.min.css" />
  <link rel="stylesheet" href="gallery/css/slicknav.min.css" />
  <link rel="stylesheet" href="gallery/css/fresco.css" />
  <link rel="stylesheet" href="gallery/css/style.css" />

  <!-- Custom Navbar and Footer Styles -->
  <link href="./img/favicon.ico" rel="icon">
  <link href="./css/style.css" rel="stylesheet">
</head>

<body>

  <!-- Navbar -->
  <?php
  include "navbar.php";
  ?>
  <!-- Navbar End -->

  <!-- hero -->

<div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">Gallery</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Gallery</p>
            </div>
            <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    
                   
                </div>
            </div>
        </div>
    </div>

  <!-- hero -->

  <!-- Gallery Section -->
  <div class="gallery__page">
    <div class="gallery__warp">
      <div class="row">
        <?php
        $galleryDir = 'gallery/gallery/';
        $images = glob($galleryDir . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);

        if ($images) {
          foreach ($images as $image) {
            $escapedPath = htmlspecialchars($image);
            echo '
              <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <a class="gallery__item fresco" href="' . $escapedPath . '" data-fresco-group="gallery">
                  <img src="' . $escapedPath . '" alt="" class="img-fluid">
                </a>
              </div>';
          }
        } else {
          echo '<p class="text-center w-100">No images in the gallery yet.</p>';
        }
        ?>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include("./footer.php"); ?>

  <!-- Scripts -->
  <script src="gallery/js/vendor/jquery-3.2.1.min.js"></script>
  <script src="gallery/js/jquery.slicknav.min.js"></script>
  <script src="gallery/js/slick.min.js"></script>
  <script src="gallery/js/fresco.min.js"></script>
  <script src="gallery/js/main.js"></script>



  <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i
            class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
