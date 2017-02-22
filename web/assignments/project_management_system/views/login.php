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

        <main class="container-fluid">
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
            <h1>Login to your account</h1>
            <div class="col-md-3">
              <form action="." method="post">
                <label>Username</label>
                <input type="text" name="org_username" placeholder="Enter Username" class="form-control">
                <label>Password</label>
                <input type="password" name="org_pwd" placeholder="Enter Password" class="form-control">
                <br />
                <input type="submit" name="action" value="Login" class="btn btn-success">
              </form>
            </div>
        </main>

        <footer>
            <div>

            </div>
        </footer>
    </body>
</html>
