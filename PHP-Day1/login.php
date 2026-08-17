<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email == "admin@gmail.com" && $password == "1234") {

        $message = "Login Successful";

    } else {

        $message = "Wrong Email or Password";

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body>



<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            My Website
        </a>

        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link active" href="login.php">
                    Login
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="register.php">
                    Register
                </a>
            </li>

        </ul>

    </div>

</nav>



<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <h2 class="text-center mb-4">
                Login
            </h2>


            <?php

            if ($message != "") {

                echo "<div class='alert alert-info'>";
                echo $message;
                echo "</div>";

            }

            ?>


            <form method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Enter your email"
                    >

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Enter your password"
                    >

                </div>


                <button
                    type="submit"
                    class="btn btn-primary">
                    Login
                </button>

            </form>

        </div>

    </div>

</div>


</body>

</html>

