<?php
session_start();
if (!isset($_SESSION["user"])) {
	header("Location: login.php"); /* Redirect browser */
	exit();
}
$username = $_SESSION["user"];
?>

<!DOCTYPE html>
<html>
    <head>
      <title>The Shop</title>
    </head>
    <body>
        <header>
            <div>
                <label>You are logged in as <?php echo $username ?></label>
                <form action="/shopping_cart/index.php" method="post">
                    <input type="hidden" name="action" value="logout" />
                    <input type="submit" value="Logout" />
                </form><br />
            </div>
        </header>

        <main>
            <div>
                <h1>Choose a product to buy</h1>
                <form action="/shopping_cart/index.php" method="post">
                    <input type="hidden" name="action" value="add_to_cart" />
                    <input type="checkbox" name="products[]" value="hat" id="hat"><label for="hat">Hat</label><br>
                    <input type="checkbox" name="products[]" value="tie" id="tie"><label for="tie">Tie</label><br>
                    <input type="checkbox" name="products[]" value="shirt" id="shirt"><label for="shirt">Shirt</label><br>
                    <input type="checkbox" name="products[]" value="shoes" id="shoes"><label for="shoes">Shoes</label><br>

                    <input type="submit" value="Add to cart">
                </form>

                </form>
            </div>
        </main>
    </body>
</html>
