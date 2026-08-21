<?php
 require "./connection.php";

$entityKey = $_GET['entity'] ?? '';

if (!isset($entities[$entityKey])) {
    header("location: index.php?errorMessage=" . urlencode("Unknown section"));
    exit;
}

$entity = $entities[$entityKey];

if (isset($_GET['delete']) && $_GET['delete'] !== '') {
    $db->delete($entity['table'], $entity['id'], $_GET['delete']);
    header("location: crud.php?entity=" . urlencode($entityKey) . "&successMessage=" . urlencode("Deleted successfully"));
    exit;
}

$rows = $db->index($entity['table']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($entity['label']) ?></title>
</head>
<body>
    <?php require "./index.php";

    if (isset($_GET["successMessage"])) {
        echo "<p class='mt-4 alert alert-success w-75 m-auto text-center'>" . htmlspecialchars($_GET["successMessage"]) . "</p>";
    }
    if (isset($_GET["errorMessage"])) {
        echo "<p class='mt-4 alert alert-danger w-75 m-auto text-center'>" . htmlspecialchars($_GET["errorMessage"]) . "</p>";
    }
    ?>

    <div class="w-75 m-auto mt-4 d-flex justify-content-between align-items-center">
        <h1><?= htmlspecialchars($entity['label']) ?></h1>
        <a class="btn btn-success" href="crud-form.php?entity=<?= urlencode($entityKey) ?>">+ Add New</a>
    </div>

    <table class="table table-striped w-75 m-auto mt-3">
        <thead>
            <tr>
                <th><?= htmlspecialchars($entity['id']) ?></th>
                <?php foreach (array_keys($entity['fields']) as $field): ?>
                    <th><?= htmlspecialchars(ucfirst($field)) ?></th>
                <?php endforeach; ?>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($rows)): ?>
                <tr><td colspan="<?= count($entity['fields']) + 2 ?>" class="text-center">No data found</td></tr>
            <?php else: ?>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row[$entity['id']]) ?></td>
                        <?php foreach (array_keys($entity['fields']) as $field): ?>
                            <td>
                                <?= $field === 'password' ? '••••••••' : htmlspecialchars($row[$field] ?? '') ?>
                            </td>
                        <?php endforeach; ?>
                        <td>
                            <a class="btn btn-sm btn-primary" href="crud-form.php?entity=<?= urlencode($entityKey) ?>&id=<?= urlencode($row[$entity['id']]) ?>">Edit</a>
                            <a class="btn btn-sm btn-danger" href="crud.php?entity=<?= urlencode($entityKey) ?>&delete=<?= urlencode($row[$entity['id']]) ?>" onclick="return confirm('Delete this record?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
