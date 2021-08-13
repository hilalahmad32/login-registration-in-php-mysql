<?php
include "php/connection.php";
session_start();
if (!isset($_SESSION["user_id"])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <div class="container my-4">
        <?php
        if (isset($_SESSION["message"])) {
        ?>
            <div class="alert alert-primary" role="alert">
                <?php echo $_SESSION["message"]; ?>
            </div>
        <?php
          unset($_SESSION["message"]);
        }
        ?>
        <h1>Dashborad</h1>
        <hr>
        <?php
        if (isset($_SESSION["user_id"])) {
            $id = $_SESSION["user_id"];
            $sql = "SELECT * FROM users WHERE users_id='{$id}'";

            $run_sql = mysqli_query($conn, $sql);
            if (mysqli_num_rows($run_sql) > 0) {
        ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>username</th>
                                <th>Age</th>
                                <th>Email</th>
                                <th>Logout</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($run_sql)) { ?>
                                <tr>
                                    <td><?php echo $row["users_id"] ?></td>
                                    <td><?php echo $row["username"] ?></td>
                                    <td><?php echo $row["age"] ?></td>
                                    <td><?php echo $row["user_email"] ?></td>
                                    <td><a href="logout.php"><button class="btn btn-danger">Logout</button></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
        <?php
            }
        }
        ?>

    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>