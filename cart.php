<?php include_once "./assets/header.php"; ?>
    <!-- Display cart items and total price -->
    <div class="container px-4 px-lg-5 mt-5">
        <h2>Ostoskori</h2>
        <?php if (empty($cartItems)) : ?>
            <p>Ostoskorisi on tyhjä.</p>
        <?php else : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Tuote</th>
                        <th>Määrä</th>
                        <th>Välisumma</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $item) : ?>
                        <tr>
                            <td><?php echo $item['product']['productname']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>$<?php echo $item['subtotal']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="2" class="text-end fw-bold">Yhteensä:</td>
                        <td>$<?php echo $totalPrice; ?></td>
                    </tr>
                </tbody>
            </table>
        <?php endif; ?>
<a href="checkout.php" class="btn btn-primary">Kassalle</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></script>
</body>
</html>
