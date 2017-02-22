<!DOCTYPE html>
<html>
    <head>
        <?php include './modules/head.html'; ?>
    </head>
    <body>
        <header>
            <?php include './modules/header.php'; ?>
        </header>

        <nav>
            <?php include './modules/nav.php'; ?>
        </nav>

        <main>
            <div class="container-fluid">
              <?php
                if($error){
                    echo "<div class='row'>
                            <div class='col-md-3'>
                              <div class='alert alert-danger'>
                                <strong id='error'>$error</strong>
                              </div>
                            </div>
                          </div>";
                }
              ?>
                <label>Username</label>
                <p>
                    <?php echo $_SESSION['org_name']; ?>
                </p>
            </div>
        </main>

        <footer>
            <div>

            </div>
        </footer>
    </body>
</html>
