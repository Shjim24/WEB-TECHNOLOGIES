<?php
include '../model/Add_records.php';

$allData = getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>
<body>
    <h2>Records</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allData as $data): ?>
                <tr>
                    <td><?php echo htmlspecialchars($data['user_id']); ?></td>
                    <td><?php echo htmlspecialchars($data['user_email']); ?></td>
                    <td><?php echo htmlspecialchars($data['user_num']); ?></td>
                    <td>
                        <form method="post" action="../controllers/delete.php">
                            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($data['user_id']); ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="../controllers/update.php">
                            <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($data['user_id']); ?>">
                            <button type="submit">Update</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
</body>
</html>
