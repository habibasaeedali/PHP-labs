<?php

session_start();

if (!isset($_SESSION["userEmail"])) {
    header("Location: login.php");
    exit;
}

$id = $_GET["id"];

$user = $_SESSION["users"][$id];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update User</title>
</head>

<body>

<?php require "./navbar.php"; ?>

<div class="container mt-5">

    <form action="server.php" method="post"
          class="border border-primary p-5 w-75 m-auto">

        <h2 class="text-center text-primary mb-4">
            Update User
        </h2>

        <input
            class="form-control mb-3"
            type="text"
            name="userName"
            value="<?php echo $user["name"]; ?>"
        >

        <input
            class="form-control mb-3"
            type="email"
            name="userEmail"
            value="<?php echo $user["email"]; ?>"
        >

        <input
            class="form-control mb-3"
            type="password"
            name="userPassword"
            value="<?php echo $user["password"]; ?>"
        >

        <!-- بنبعت رقم الـ user -->
        <input
            type="hidden"
            name="id"
            value="<?php echo $id; ?>"
        >

        <input
            class="btn btn-primary"
            type="submit"
            name="btn-update"
            value="Update"
        >

    </form>

</div>

</body>

</html>