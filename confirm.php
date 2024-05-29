<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style1.css">
    <title>Password Confirmation</title>
</head>
<body>
    <?php
    require('./connecticut.php');
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $user = crudygobert::userDataPerId($id);

        if (!$user) {
            die('Invalid user.');
        }

        if (isset($_POST['confirm_button'])) {
            $password = $_POST['password'];

            if (!empty($password)) {
                if ($user['pass'] === $password) {
                    header("Location: edit.php?id_up=$id");
                    exit();
                } else {
                    echo '<p>Password incorrect. Please try again.</p>';
                }
            } else {
                echo '<p>Please enter your password.</p>';
            }
        }
    } else {
        die('No user specified.');
    }
    ?>
    <div class="form">
        <div class="title">
            <p>Enter Your Password to Continue Editing</p>
        </div>
        <form action="" method="post">
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Confirm" name="confirm_button">
        </form>
    </div>
</body>
</html>
