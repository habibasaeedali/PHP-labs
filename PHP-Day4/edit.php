<?php
require "./connection.php";
require './index.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("location:allUsers.php?errorMessage=user not found");
    exit;
}

$user = $db->show("users", $id);

if (!$user) {
    header("location:allUsers.php?errorMessage=user not found");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>

<section class="m-3">
    <h2 class="w-75 m-auto">Edit User</h2>
    <form action="server.php" method="post" class="border border-primary w-75 m-auto p-5">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <input class="form-control m-3" type="text" name="userName" value="<?= $user['name'] ?>" placeholder="Enter Name" required>
        <input class="form-control m-3" type="email" name="userEmail" value="<?= $user['email'] ?>" placeholder="Enter Email" required>
        <input class="btn btn-primary m-3" type="submit" value="Update" name="btn-update-user">
    </form>
</section>

</body>
</html>
