<?php
require "./connection.php";

if (isset($_POST['btn-register'])) {
    $userName     = trim($_POST["userName"]);
    $userEmail    = trim($_POST["userEmail"]);
    $userPassword = $_POST["userPassword"];

    $namePattern = '/^[a-zA-Z ]{3,}$/';
    if (!preg_match($namePattern, $userName)) {
        header("location:register.php?errorMessage=" . urlencode("Name must be letters only and at least 3 characters"));
        exit;
    }

    
    $passwordPattern = '/^(?=.*[A-Za-z])(?=.*\d).{8,}$/';
    if (!preg_match($passwordPattern, $userPassword)) {
        header("location:register.php?errorMessage=" . urlencode("Password must be at least 8 characters and include letters and numbers"));
        exit;
    }

    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        header("location:register.php?errorMessage=" . urlencode("Enter a valid Email"));
        exit;
    }

    $emailExist = $db->findOne("users", "email", $userEmail);
    if ($emailExist) {
        header("location:register.php?errorMessage=" . urlencode("Email already exists"));
        exit;
    }

    $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
    $created = $db->create("users", [
        "name"     => $userName,
        "email"    => $userEmail,
        "password" => $hashedPassword,
    ]);

    if ($created) {
        header("location:login.php?successMessage=" . urlencode("Registered successfully, please login"));
        exit;
    } else {
        header("location:register.php?errorMessage=" . urlencode("Something went wrong, please try again"));
        exit;
    }
}


if (isset($_POST["btn-login"])) {
    $userEmail    = trim($_POST["userEmail"]);
    $userPassword = $_POST["userPassword"];

    $data = $db->findOne("users", "email", $userEmail);

    if ($data && password_verify($userPassword, $data['password'])) {
        $_SESSION['loginID'] = $data['id'];
        header("location:profile.php?successMessage=" . urlencode("Login successfully"));
        exit;
    } else {
        header("location:login.php?errorMessage=" . urlencode("Check your email or password"));
        exit;
    }
}
