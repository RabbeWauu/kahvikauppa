<?php
include_once "./assets/header.php";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    // Process the form data and move to the checkout page
    // You can implement this part based on your requirements
    header('Location: checkout.php');
    exit;
}

    $cartItems = getCartItems();
$shippingOptions = array(
    'Nouto liikkeestä',
    'Postipaketti pakettiautomaattiin',
    'Toimitus kotiovelle'
);

?>
    <div class="container mt-5">
        <h2>Ostoskori</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tuote</th>
                    <th>Määrä</th>
                    <th>Välisumma</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItems as $productId => $quantity) : ?>
                    <?php $product = getProductById($productId); ?>
                    <tr>
                        <td><?php echo $product['productname']; ?></td>
                        <td><?php echo $quantity; ?></td>
                        <td>$<?php echo $product['productprice'] * $quantity; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">Yhteensä:</td>
                    <td>$<?php echo calculateCartTotal($cartItems); ?></td>
                </tr>
            </tfoot>
        </table>

        <form method="post" action="">
            <h2>Toimitus</h2>
            <div class="mb-3">
                <label for="shippingOption" class="form-label">Toimitusvaihtoehdot</label>
                <select class="form-select" id="shippingOption" name="shipping_option">
                    <?php foreach ($shippingOptions as $option) : ?>
                        <option value="<?php echo $option; ?>"><?php echo $option; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <h2>Customer Information</h2>
            <!-- ask first and last name, email, street name, postal number and city -->
            <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="firstName" class="form-label">Etunimi *</label>
                <input type="text" class="form-control" id="firstName" name="first_name" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="lastName" class="form-label">Sukunimi</label>
                <input type="text" class="form-control" id="lastName" name="last_name">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <label for="street" class="form-label">Lähiosoite *</label>
                <input type="text" class="form-control" id="street" name="street" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="postalNumber" class="form-label">Postiosoite *</label>
                <input type="text" class="form-control" id="postalNumber" name="postal_number" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="city" class="form-label">Paikkakunta *</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="email" class="form-label">Sähköpostiosoite *</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>
    </div>

</form>
<a href='./payment.php'><button type="submit" class="btn btn-primary" name="checkout">Continue</button></a>
    </div>

<?php include_once "./assets/footer.php"; ?>
