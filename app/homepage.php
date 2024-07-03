<?php
session_start();
require_once __DIR__ . '/../backend/config/database.php';

// Pagination settings
$limit = 10; // Number of products per page
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $limit;

// Ambil total jumlah produk unggulan
$stmt = $pdo->prepare("SELECT COUNT(*) FROM products WHERE featured = 1");
$stmt->execute();
$total_products = $stmt->fetchColumn();
$total_pages = ceil($total_products / $limit);

// Ambil produk unggulan sesuai halaman
$stmt = $pdo->prepare("SELECT * FROM products WHERE featured = 1 LIMIT :limit OFFSET :offset");
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$featured_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_SESSION['logout_message'])) {
    $logout_message = $_SESSION['logout_message'];
    unset($_SESSION['logout_message']);
} else {
    $logout_message = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="LUMINOUS is your one-stop shop for the best products. Explore our featured products and special offers.">
    <meta name="keywords" content="e-commerce, shopping, best products, discounts, LUMINOUS">
    <meta name="author" content="LUMINOUS">
    <title>LUMINOUS - Your One-Stop Shop</title>
    <link rel="apple-touch-icon" sizes="180x180" href="includes/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="512x512" href="includes/android-chrome-512x512.png">
    <link rel="icon" type="image/png" sizes="192x192" href="includes/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="includes/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="includes/favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <!-- Open Graph Meta Tags for social media sharing -->
    <meta property="og:title" content="LUMINOUS - Your One-Stop Shop">
    <meta property="og:description" content="Explore our featured products and special offers on LUMINOUS.">
    <meta property="og:image" content="URL_TO_YOUR_IMAGE">
    <meta property="og:url" content="YOUR_WEBSITE_URL">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="LUMINOUS">
</head>

<body>
    <?php
    include_once 'includes/header.php';
    ?>

    <div class="container-fluid p-0">
        <div class="jumbotron text-center">
            <h1 class="display-4">Welcome to <b class="jumbotron-brand">LUMINOUS</b></h1>
            <p class="lead">Your one-stop shop for the best products!</p>
            <p>Explore our featured products below.</p>
        </div>
    </div>

    <div class="container my-5">
        <h2>Featured Products</h2>
        <div class="row">
            <?php if (empty($featured_products)) : ?>
                <div class="col-md-12">
                    <p>No featured products available at the moment. Please check back later.</p>
                    <div class="skeleton"></div>
                    <div class="skeleton"></div>
                    <div class="skeleton"></div>
                </div>
            <?php else : ?>
                <?php foreach ($featured_products as $product) : ?>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                        <div class="card h-100">
                            <?php if ($product['thumbnail']) : ?>
                                <img src="img/<?php echo htmlspecialchars($product['thumbnail']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                                <?php if ($product['discount_price']) : ?>
                                    <p class="card-text">
                                        <span class="text-danger">Rp<?php echo number_format($product['discount_price'], 0, ',', '.'); ?></span>
                                        <small class="text-muted"><del>Rp<?php echo number_format($product['price'], 0, ',', '.'); ?></del></small>
                                    </p>
                                <?php else : ?>
                                    <p class="card-text">Rp<?php echo number_format($product['price'], 0, ',', '.'); ?></p>
                                <?php endif; ?>
                                <p class="card-text">
                                    <i class="fas fa-star text-warning"></i> <?php echo htmlspecialchars($product['rating']); ?> | <?php echo number_format($product['sold_count']); ?>+ sold
                                </p>
                                <a href="product?id=<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-primary">View Product</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>

    <?php include_once 'includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>