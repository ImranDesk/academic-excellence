<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>Gallery | Academic Excellence</title>
  <meta charset="UTF-8">
  <meta name="description" content="Gallery Page">
  <meta name="keywords" content="gallery, photos">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
  include("navbar.php");
  ?>
  <!-- Navbar End -->

  <!-- hero -->



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
</body>

</html>
