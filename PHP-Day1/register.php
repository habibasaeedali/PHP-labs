
<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];


    if ($password != $confirm_password) {

        $message = "Passwords do not match";

    } else {

        $message = "Registration Successful";

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>

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
                <a class="nav-link" href="login.php">
                    Login
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" href="register.php">
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
                Register
            </h2>


            <?php

            if ($message != "") {

                echo "<div class='alert alert-info'>";
                echo $message;
                echo "</div>";

            }

            ?>


            <form method="POST">

                <!-- Name -->

                <div class="mb-3">

                    <label class="form-label">
                        Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Enter your name"
                        required
                    >

                </div>



                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Enter your email"
                        required
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
                        required
                    >

                </div>



                <div class="mb-3">

                    <label class="form-label">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        name="confirm_password"
                        class="form-control"
                        placeholder="Confirm your password"
                        required
                    >

                </div>



                <button
                    type="submit"
                    class="btn btn-success w-100">

                    Register

                </button>

            </form>

        </div>

    </div>

</div>


</body>

</html>
```
