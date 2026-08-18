
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body {
            background-color: #f5f7fb;
        }

        .login-section {
            min-height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-form {
            width: 450px;
            background-color: white;
            border: none !important;
            border-radius: 15px;
            padding: 40px !important;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.12);
        }

        .login-title {
            text-align: center;
            margin-bottom: 30px;
            color: #0d6efd;
            font-weight: bold;
            font-size: 30px;
        }

        .login-form input {
            margin: 0 0 20px 0 !important;
            height: 48px;
            border-radius: 8px;
        }

        .login-form input:focus {
            box-shadow: 0 0 5px rgba(13, 110, 253, 0.35);
        }

        .login-btn {
            width: 100%;
            height: 50px;
            margin-top: 10px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>

</head>

<body>

    <?php
    require "./navbar.php";

    if (isset($_GET["message"])) {
        echo "<p class='mt-5 alert alert-success w-75 m-auto text-center'>" . $_GET["message"] . "</p>";
    }
    ?>

    <section class="login-section">

        <form action="server.php" method="post" class="login-form">

            <h2 class="login-title">Login</h2>

            <input
                class="form-control"
                type="email"
                name="userEmail"
                placeholder="Enter Your Email">

            <input
                class="form-control"
                type="password"
                name="userPassword"
                placeholder="Enter Your Password">

            <input
                class="btn btn-primary login-btn"
                type="submit"
                value="Login"
                name="btn-login">

        </form>

    </section>

</body>

</html>

