<?php
require_once "connect.php";

function getAllProducts(){
    // pdo using my function in connect.php
    $pdo = connect();
    $sql = "SELECT * FROM product";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll();
    return $products;
}

function addToCart($productId, $quantity = 1) {
    if (isset($_SESSION['cart'][$productId])) {
        // Product is already in the cart, update the quantity
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        // Product is not in the cart, add it
        $_SESSION['cart'][$productId] = (int) $quantity;
    }
}


// product by Id
function getProductById($id) {
    $pdo = connect();
    $sql = "SELECT * FROM product WHERE productID = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $product = $stmt->fetch();
    return $product;
}

function getCartItems() {
    return $_SESSION['cart'] ?? [];
}


function calculateCartTotal($cartitems) {
    $cartItems = getCartItems();
    $total = 0;

    foreach ($cartItems as $productId => $quantity) {
        $product = getProductById($productId);
        if ($product) {
            $total += $product['productprice'] * $quantity;
        }
    }
    return $total;
}

function generateOrderNumber() {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $orderNumber = '#' . '';

    // Generate a random order number of length 8
    for ($i = 0; $i < 8; $i++) {
        $orderNumber .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $orderNumber;
}