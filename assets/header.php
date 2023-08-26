<?php
session_start();
require_once "connect.php"; 
require_once 'functions.php';

// Initialize $product as an empty array
$product = null;

if (isset($_GET['id'])) {
    $productId = intval($_GET['id']);
    $product = getProductById($productId);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $productId = intval($_POST['product_id']);
    addToCart($productId);
    $_SESSION['success_message'] = 'Product added to cart.';
}

$cartItems = [];
$totalPrice = 0;

foreach ($_SESSION['cart'] ?? [] as $productId => $quantity) {
    $product = getProductById($productId);
    if ($product) {
        $cartItems[] = [
            'product' => $product,
            'quantity' => $quantity,
            'subtotal' => $product['productprice'] * $quantity
        ];
        $totalPrice += $product['productprice'] * $quantity;
    }
}
$totalQuantity = 0;

foreach ($cartItems as $item) {
    $totalQuantity += $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>KahviKeisari</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/kahvikeisari/">KahviKeisari</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link" aria-current="page" href="/kahvikeisari/">Koti</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">Tietoa yrityksestämme</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kauppa</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Kaikki tuotteet</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Suosituimmat tuotteet</a></li>
                        <li><a class="dropdown-item" href="#!">Uusimmat tuotteet</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <a class="btn btn-outline-light" href="cart.php">
                    <i class="bi-cart-fill me-1"></i>
                    Ostoskori
                    <span class="badge bg-light text-black ms-1 rounded-pill">
                    <?php echo $totalQuantity; ?>
                    </span>
                </a>
            </form>
        </div>
    </div>
</nav>