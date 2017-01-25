<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
      <title>The Shop</title>
    </head>
    <body>
        <header>
            <div>
                <h1>Your Shopping Cart</h1>
            </div>
        </header>

        <main>
            <div>
                <?php
                $products = $_SESSION["cart"];
                foreach ($products as $product) {
                    echo "<p>$product</p>";
                }
                ?>

                <br /><br />
                <a href="products.php"><button>Continue Shopping</button></a>
            </div>
        </main>
    </body>
</html>
