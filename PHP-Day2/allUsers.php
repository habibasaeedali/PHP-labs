
<?php

session_start();

if (!isset($_SESSION["userEmail"])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>All Users</title>

</head>

<body>

<?php require "./navbar.php"; ?>

<section class="container mt-5">

    <h2 class="text-center text-primary mb-4">
        All Users Data
    </h2>

    <table class="table table-bordered table-striped text-center">

        <thead class="table-primary">

            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>

        </thead>

        <tbody>

        <?php

        if (isset($_SESSION["users"])) {

            $i = 0;

            foreach ($_SESSION["users"] as $user) {

                echo "<tr>";

                echo "<td>" . ($i + 1) . "</td>";
                echo "<td>" . $user["name"] . "</td>";
                echo "<td>" . $user["email"] . "</td>";
                echo "<td>" . $user["password"] . "</td>";

                echo "<td>";

                echo "<a href='update.php?id=$i' class='btn btn-warning me-2'>Update</a>";

                echo "<a href='server.php?delete=$i' 
                        class='btn btn-danger'
                        onclick='return confirm(\"Are you sure you want to delete this user?\")'>
                        Delete
                      </a>";

                echo "</td>";

                echo "</tr>";

                $i++;
            }
        }

        ?>

        </tbody>

    </table>

</section>

</body>

</html>

