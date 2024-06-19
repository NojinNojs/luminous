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

include 'includes/header.php';
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
                        <?php if ($product['thumbnail']): ?>
                            <img src="img/<?php echo htmlspecialchars($product['thumbnail']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                            <?php if ($product['discount_price']): ?>
                                <p class="card-text">
                                    <span class="text-danger">Rp<?php echo number_format($product['discount_price'], 0, ',', '.'); ?></span>
                                    <small class="text-muted"><del>Rp<?php echo number_format($product['price'], 0, ',', '.'); ?></del></small>
                                </p>
                            <?php else: ?>
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

<?php include 'includes/footer.php'; ?>
