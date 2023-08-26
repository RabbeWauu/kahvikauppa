<?php 
require_once "./assets/connect.php"; 
require_once "./assets/functions.php";

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

$products = getAllProducts();

$totalQuantity = 0;

foreach ($cartItems as $item) {
    $totalQuantity += $item['quantity'];
}

include_once "./assets/header.php";
?>

        <!-- Header-->
        <header id='front-header' class="bg py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Tervetuloa kahville!</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Parhaimmat kahvituotteet vain meiltä!</p>
                </div>
            </div>
        </header>
        <!-- Section-->
<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
    <?php foreach ($products as $product) : ?>
        <div class="col mb-5">
    <div class="card h-100">
        <a href="product.php?id=<?php echo $product['productID']; ?>">
            <img class="card-img-top" src="assets/prod1.jpg" alt="..." />
        </a>
        <div class="card-body p-4">
            <div class="text-center">
                <h5 class="fw-bolder"><?php echo $product['productname']; ?></h5>
                <span>$<?php echo $product['productprice']; ?></span>
            </div>
        </div>
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <form method="post" action="index.php">
                <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">
                <div class="text-center"><button type="submit" class="btn btn-outline-dark mt-auto">Lisää ostoskoriin</button></div>
            </form>
        </div>
    </div>
</div>
    <?php endforeach; ?>
</div>

        </div>
    </section>

<?php include_once "./assets/footer.php"; ?>
