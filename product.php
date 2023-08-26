<?php include_once "./assets/header.php"; ?>

<div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-6">
                <?php if ($product) : ?>
                    <div class="card">
                        <div class="card-body">
                            <img class="card-img-top" src="assets/prod1.jpg" alt="Product Image">
                            <h5 class="card-title"><?php echo $product['productname']; ?></h5>
                            <p class="card-text">$<?php echo $product['productprice']; ?></p>
                            <p class="card-text"><?php echo $product['productshortdesc']; ?></p>
                            <p class="card-text"><?php echo $product['productadditionalinfo']; ?></p>
                        </div>
                        <div class="card-footer">
                            <form method="post" action="product.php?id=<?php echo $product['productID']; ?>">
                                <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">
                                <button type="submit" class="btn btn-outline-dark">Lisää ostoskoriin</button>
                            </form>
                        </div>
                    </div>
                <?php else : ?>
                    <p>Tuotetta ei löytynyt.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- ... (script links) ... -->
<?php include_once "./assets/footer.php"; ?>
