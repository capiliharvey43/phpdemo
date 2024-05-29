<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style1.css">
    <title>Update User Data</title>
</head>
<body>
    <?php
    require('./connecticut.php');

    // Check if the user is trying to update
    if (isset($_GET['id_up'])) {
        $id_up = $_GET['id_up'];
        $data = crudygobert::userDataPerId($id_up);

        // Check if form is submitted
        if (isset($_POST['signUP_button'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $age = $_POST['age'];

            $p = crudygobert::connect()->prepare('UPDATE crudtable SET name=:n, email=:l, age=:e WHERE id=:id');
            $p->bindValue(':id', $id_up);
            $p->bindValue(':n', $name);
            $p->bindValue(':l', $email);
            $p->bindValue(':e', $age);
            $p->execute();

            // Redirect to users.php after updating
            header("Location: users.php");
            exit();
        }
    } else {
        echo '<p>No user specified.</p>';
    }
    ?>
    <div class="form">
        <div class="title">
            <p>Updating user data</p>
        </div>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Name" value="<?php if(isset($data)){ echo $data['name']; } ?>">
            <input type="email" name="email" placeholder="Email" value="<?php if(isset($data)){ echo $data['email']; } ?>">
            <input type="text" name="age" placeholder="Age" value="<?php if(isset($data)){ echo $data['age']; } ?>">
            <input type="submit" value="UPDATE" name="signUP_button"> 
        </form>
    </div>
</body>
</html>
