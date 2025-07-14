<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>Gallery | Academic Excellence</title>
  <meta charset="UTF-8">
  <meta name="description" content="Gallery Page">
  <meta name="keywords" content="gallery, photos">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/slicknav.min.css" />
  <link rel="stylesheet" href="css/fresco.css" />
  <link rel="stylesheet" href="css/style.css" />

  <!-- Custom Navbar and Footer Styles -->
  <link href="../img/favicon.ico" rel="icon">
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>

  <!-- Navbar -->
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 px-lg-5">
      <a href="../index.php" class="navbar-brand ml-lg-3">
        <h4 class="m-0 text-uppercase text-primary">
          <i class="fa fa-book-reader mr-3"></i>Academic Excellence
        </h4>
      </a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
        <div class="navbar-nav mx-auto py-0">
          <a href="index.php" class="nav-item nav-link">Home</a>
          <a href="about.php" class="nav-item nav-link">About</a>
          <a href="course.php" class="nav-item nav-link">Courses</a>
          <a href="blogs.php" class="nav-item nav-link">Blogs</a>
          <a href="./gallery/gallery.php" class="nav-item nav-link active">Gallery</a>
          <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
            <div class="dropdown-menu m-0">
              <a href="detail.php" class="dropdown-item">Course Detail</a>
              <a href="feature.php" class="dropdown-item">Our Features</a>
              <a href="testimonial.php" class="dropdown-item">Testimonial</a>
            </div>
          </div>
          <a href="contact.php" class="nav-item nav-link">Contact</a>
        </div>
        <a href="#" class="btn btn-primary py-2 px-4 d-none d-lg-block">Join Us</a>
      </div>
    </nav>
  </div>
  <!-- Navbar End -->

  <!-- Gallery Section -->
  <div class="gallery__page">
    <div class="gallery__warp">
      <div class="row">
        <?php
        $galleryDir = './gallery/';
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
  <?php include("../footer.php"); ?>

  <!-- Scripts -->
  <script src="js/vendor/jquery-3.2.1.min.js"></script>
  <script src="js/jquery.slicknav.min.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/fresco.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>
