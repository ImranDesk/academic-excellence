<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
  data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Admin Panel</title>
  <meta name="description" content="" />
  <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="assets/css/demo.css" />
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <script src="assets/vendor/js/helpers.js"></script>
  <script src="assets/js/config.js"></script>
</head>
<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.html" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-0">Admin Panel</span>
          </a>
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>
        <div class="menu-inner-shadow"></div>
        <ul class="menu-inner py-1">
          <li class="menu-item <?php if ($currentPage === 'index.html') echo 'active'; ?>">
            <a href="index.html" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>
          <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li>
          <li class="menu-item <?php if (in_array($currentPage, ['add-blog.php', 'upload-gallery.php'])) echo 'active open'; ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div data-i18n="Form Elements">Forms</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item <?php if ($currentPage === 'add-blog.php') echo 'active'; ?>">
                <a href="add-blog.php" class="menu-link">
                  <div data-i18n="Basic Inputs">Post Blog</div>
                </a>
              </li>
              <li class="menu-item <?php if ($currentPage === 'upload-gallery.php') echo 'active'; ?>">
                <a href="upload-gallery.php" class="menu-link">
                  <div data-i18n="Basic Inputs">Post Photo</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item <?php if ($currentPage === 'admin.php') echo 'active'; ?>">
            <a href="admin.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-table"></i>
              <div data-i18n="Tables">Blogs</div>
            </a>
          </li>
        </ul>
      </aside>
      <div class="layout-page">
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
              </div>
            </div>
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#"><div class="d-flex"><div class="flex-shrink-0 me-3"><div class="avatar avatar-online"><img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" /></div></div><div class="flex-grow-1"><span class="fw-semibold d-block">John Doe</span><small class="text-muted">Admin</small></div></div></a></li>
                  <li><div class="dropdown-divider"></div></li>
                  <li><a class="dropdown-item" href="auth-login-basic.html"><i class="bx bx-power-off me-2"></i><span class="align-middle">Log Out</span></a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Basic Inputs</h4>
            <div class="row">
              <form action="../save-blog.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="blogTitle" class="form-label">Blog Title</label>
                  <input type="text" class="form-control" name="title" id="blogTitle" required />
                </div>
                <div class="mb-3">
                  <label for="blogAuthor" class="form-label">Author Name</label>
                  <input type="text" class="form-control" name="author" id="blogAuthor" required />
                </div>
                <div class="mb-3">
                  <label for="blogContent" class="form-label">Blog Content</label>
                  <textarea class="form-control" name="content" id="blogContent" rows="5" required></textarea>
                </div>
                <div class="mb-3">
                  <label for="blogImage" class="form-label">Upload Image</label>
                  <input class="form-control" type="file" name="image" id="blogImage" required />
                </div>
                <button type="submit" class="btn btn-primary">Post Blog</button>
              </form>
            </div>
          </div>
          <div class="content-backdrop fade"></div>
        </div>
      </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <script src="assets/vendor/libs/jquery/jquery.js"></script>
  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="assets/vendor/js/menu.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/form-basic-inputs.js"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
