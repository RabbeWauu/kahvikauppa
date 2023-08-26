<?php include_once "./assets/header.php"; ?>
    
<form action="process_payment.php" method="post" class="payment-form">
    <div class="container" style="min-height:79vh;overflow:hidden;">
        <h1 class="my-4">Payment</h1>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="btn-group mb-4">
                    <button type="button" class="btn btn-outline-primary active" id="creditCardBtn">Credit Card</button>
                    <button type="button" class="btn btn-outline-primary" id="paypalBtn">PayPal</button>
                </div>
                <div id="creditCardForm">
    <!-- Credit Card Form -->
    <div class="mb-3">
        <label for="cardNumber" class="form-label">Card Number</label>
        <input type="text" class="form-control" id="cardNumber" name="card_number" placeholder="Enter card number">
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="expiryDate" class="form-label">Expiry Date</label>
                <input type="text" class="form-control" id="expiryDate" name="expiry_date" placeholder="MM/YY">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="securityCode" class="form-label">CVV</label>
                <input type="text" class="form-control" id="securityCode" name="security_code" placeholder="CVV">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="cardOwner" class="form-label">Card Owner's Name</label>
        <input type="text" class="form-control" id="cardOwner" name="card_owner" placeholder="Card owner's name">
    </div>
</div>
<div id="paypalForm">
    <!-- PayPal Form -->
    <div class="mb-3">
        <label for="paypalEmail" class="form-label">PayPal Email</label>
        <input type="email" class="form-control" id="paypalEmail" name="paypal_email" placeholder="Enter PayPal email" style="max-width: 100%;">
    </div>
</div>
                <h3>Final Order Total:</h3>
                <h3><?php echo calculateCartTotal($cartItems); ?> €</h3>
                <button type="submit" class="btn btn-primary" name="submitPayment">Complete Payment</button>
            </div>
        </div>
    </div>
</form>


<script>
    const creditCardBtn = document.getElementById('creditCardBtn');
    const paypalBtn = document.getElementById('paypalBtn');
    const creditCardForm = document.getElementById('creditCardForm');
    const paypalForm = document.getElementById('paypalForm');

    // Show credit card form by default
    creditCardForm.style.display = 'block';
    paypalForm.style.display = 'none';

    creditCardBtn.addEventListener('click', function() {
        creditCardForm.style.display = 'block';
        paypalForm.style.display = 'none';
        creditCardBtn.classList.add('active');
        paypalBtn.classList.remove('active');
    });

    paypalBtn.addEventListener('click', function() {
        creditCardForm.style.display = 'none';
        paypalForm.style.display = 'block';
        creditCardBtn.classList.remove('active');
        paypalBtn.classList.add('active');
    });
</script>


<?php include_once "./assets/footer.php"; ?>