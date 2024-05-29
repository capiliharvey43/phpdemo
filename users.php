<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style2.css">
    <title>Users</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require('./connecticut.php');
        $p = crudygobert::Selectdata();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $e = crudygobert::delete($id);
        }
        if (count($p) > 0) {
            for ($i = 0; $i < count($p); $i++) { 
                echo '<tr>';
                echo '<td>' . htmlspecialchars($p[$i]['name']) . '</td>';
                echo '<td>' . htmlspecialchars($p[$i]['email']) . '</td>';
                echo '<td>' . htmlspecialchars($p[$i]['age']) . '</td>';
                ?>
                <td><a href="users.php?id=<?php echo htmlspecialchars($p[$i]['id']); ?>"><img src="./trash.svg" alt="Delete"></a></td>
                <td><a href="confirm.php?id=<?php echo htmlspecialchars($p[$i]['id']); ?>"><img src="./edit.svg" alt="Edit"></a></td>
                <?php
                echo '</tr>';
            }
        }
        ?>
        </tbody>
    </table>
</body>
</html>
