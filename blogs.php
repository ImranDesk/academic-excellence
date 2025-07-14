<?php
include 'db.php';

include 'navbar.php';

// Handle search
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

if (!empty($search)) {
    $stmt = $pdo->prepare("SELECT * FROM blogs WHERE title LIKE ? OR content LIKE ? ORDER BY created_at DESC");
    $stmt->execute(["%$search%", "%$search%"]);
} else {
    $stmt = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC");
}

$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Recent blogs
$recentStmt = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC LIMIT 4");
$recentBlogs = $recentStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edukate - Blogs</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<!-- Page Header -->
<div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
    <div class="container text-center py-5">
        <h1 class="text-white display-1">Blogs</h1>
        <div class="d-inline-flex text-white mb-5">
            <p class="m-0 text-uppercase"><a class="text-white" href="index.php">Home</a></p>
            <i class="fa fa-angle-double-right pt-1 px-3"></i>
            <p class="m-0 text-uppercase">Blogs</p>
        </div>
        <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
            <form method="GET" action="">
                
            </form>
        </div>
    </div>
</div>

<!-- Blog Section -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <!-- Main Blog List -->
            <div class="col-lg-8">
                <div class="mb-5">
                    <div class="section-title position-relative mb-5">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">From Our Blog</h6>
                        <h1 class="display-4">Latest Blog Posts</h1>
                    </div>

                    <?php if (count($blogs) === 0): ?>
                        <p>No blog posts found.</p>
                    <?php else: ?>
                        <?php foreach ($blogs as $blog): ?>
                            <div class="mb-5">
                                <?php if (!empty($blog['image'])): ?>
                                    <img class="img-fluid rounded w-100 mb-4" src="<?= htmlspecialchars($blog['image']) ?>" alt="<?= htmlspecialchars($blog['title']) ?>">
                                <?php endif; ?>
                                <h2><?= htmlspecialchars($blog['title']) ?></h2>
                                <p><strong>By <?= htmlspecialchars($blog['author'] ?? 'Unknown') ?> on <?= date('F j, Y', strtotime($blog['created_at'])) ?></strong></p>
                                <p><?= nl2br(htmlspecialchars(substr($blog['content'], 0, 300))) ?>...</p>
                                <!-- <a href="#" class="btn btn-primary">Read More</a> -->
                                 <a href="blog-details.php?id=<?= $blog['id'] ?>" class="btn btn-primary">Read More</a>

                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 mt-5 mt-lg-0">
                <div class="mb-5">
                    <h2 class="mb-4">Recent Blogs</h2>
                    <?php foreach ($recentBlogs as $recent): ?>
                        <a class="d-flex align-items-center text-decoration-none mb-4" href="#">
                            <?php if (!empty($recent['image'])): ?>
                                <img class="img-fluid rounded" src="<?= htmlspecialchars($recent['image']) ?>" alt="<?= htmlspecialchars($recent['title']) ?>" style="width: 80px; height: 80px; object-fit: cover;">
                            <?php endif; ?>
                            <div class="pl-3">
                                <h6 class="m-0"><?= htmlspecialchars($recent['title']) ?></h6>
                                <div class="d-flex mt-1">
                                    <small class="text-body mr-3"><i class="fa fa-user text-primary mr-2"></i><?= htmlspecialchars($recent['author'] ?? 'Unknown') ?></small>
                                    <small class="text-body"><i class="fa fa-calendar text-primary mr-2"></i><?= date('M d, Y', strtotime($recent['created_at'])) ?></small>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- Footer -->
<?php include 'footer.php'; ?>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
