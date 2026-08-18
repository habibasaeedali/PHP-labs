
<?php

session_start();



if (isset($_POST["btn-register"])) {

    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];

    if (!isset($_SESSION["users"])) {
        $_SESSION["users"] = [];
    }

    $user = [
        "name" => $userName,
        "email" => $userEmail,
        "password" => $userPassword
    ];

    $_SESSION["users"][] = $user;

    header("Location: login.php?message=Registration Successful");
    exit;
}



if (isset($_POST["btn-login"])) {

    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];

    $found = false;

    if (isset($_SESSION["users"])) {

        foreach ($_SESSION["users"] as $user) {

            if (
                $user["email"] == $userEmail &&
                $user["password"] == $userPassword
            ) {

                // User is logged in
                $_SESSION["userEmail"] = $user["email"];
                $_SESSION["userName"] = $user["name"];

                $found = true;

                // Go to all users page
                header("Location: allUsers.php");
                exit;
            }
        }
    }

   
    if (!$found) {
        header("Location: login.php?message=Invalid Email or Password");
        exit;
    }
}

// UPDATE

if (isset($_POST["btn-update"])) {

    $id = $_POST["id"];

    $_SESSION["users"][$id]["name"] = $_POST["userName"];

    $_SESSION["users"][$id]["email"] = $_POST["userEmail"];

    $_SESSION["users"][$id]["password"] = $_POST["userPassword"];

    header("Location: allUsers.php");

    exit;
}

// DELETE

if (isset($_GET["delete"])) {

    $id = $_GET["delete"];

    unset($_SESSION["users"][$id]);

    $_SESSION["users"] = array_values($_SESSION["users"]);

    header("Location: allUsers.php");

    exit;
}
?>

