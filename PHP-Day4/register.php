  <?php require "./connection.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <style>
        body {
            background-color: #f5f7fb;
        }

        .register-section {
            min-height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-form {
            width: 450px;
            background-color: white;
            border: none !important;
            border-radius: 15px;
            padding: 40px !important;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.12);
        }

        .register-title {
            text-align: center;
            margin-bottom: 30px;
            color: #0d6efd;
            font-weight: bold;
            font-size: 30px;
        }

        .register-form input {
            margin: 0 0 20px 0 !important;
            height: 48px;
            border-radius: 8px;
        }

        .register-form input:focus {
            box-shadow: 0 0 5px rgba(13, 110, 253, 0.35);
        }

        .register-btn {
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

    <?php require "./navbar.php" ?>

    <section class="register-section">

        <form action="server.php" method="post" class="register-form">

            <h2 class="register-title">Register</h2>

            <input
                class="form-control"
                type="text"
                name="userName"
                placeholder="Enter Your Name">

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
                class="btn btn-primary register-btn"
                type="submit"
                value="Register"
                name="btn-register">

        </form>

    </section>

</body>

</html>
