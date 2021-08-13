<?php
include "header.php";
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12 offset-lg-3 offset-md-2 offset-sm-0">
            <?php
            if (isset($_SESSION["message"])) {
            ?>
                <div class="alert alert-primary" role="alert">
                   <?php   echo $_SESSION["message"]; ?>
                </div>
            <?php
                unset($_SESSION["message"]);
            }
            ?>
            <?php
            if (isset($_SESSION["error"])) {
            ?>
                <div class="alert alert-danger" role="alert">
                   <?php   echo $_SESSION["error"]; ?>
                </div>
            <?php
                unset($_SESSION["error"]);
            }
            ?>
            <div class="card">
                <div class="card-header">
                    <h1>Login Form</h1>
                </div>
                <div class="card-body">
                    <form action="php/login.php" method="post">
                        <div class="form-group">
                            <label for="">Enter email</label>
                            <input type="text" name="email" id="" class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                            <label for="">Enter password</label>
                            <input type="password" name="password" id="" class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-success">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <h5>Create Acount <a href="/register.php">Register</a></h5>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>