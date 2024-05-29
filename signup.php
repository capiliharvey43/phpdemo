<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style1.css">
    <title>Sign UPp</title>
</head>
<body>
    <?php
        require('./connecticut.php');
        if (isset($_POST['signUP_button'])) {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $age=$_POST['age'];
            $password=$_POST['password'];
            $confPassword=$_POST['confiPassword'];
           if (!empty($_POST['name'])&& !empty($_POST['email'])&& !empty($_POST['age'])&&!empty($_POST['password'])) {
            if ($password== $confPassword) {
                $p=crudygobert::connect()->prepare('INSERT INTO crudtable(name,email,age,pass) VALUES(:n,:l,:e,:p)');
                $p->bindValue(':n', $name);
                $p->bindValue(':l', $email);
                $p->bindValue(':e', $age);
                $p->bindValue(':p',$password);
                $p->execute();
                echo 'User added successfully!';
            }else{
                echo 'Password does not match!';
            }
           }
        }

    ?>
    <div class="form">
        <div class="title">
            <p>Sign UP form</p>
        </div>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="age" placeholder="Age">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="confiPassword" placeholder="Confirm Password">
            
            <input type="submit" value="Sign Up" name="signUP_button"> 
            <a href="./login.php">Do you have account? Sign in</a>
        </form>
    </div>
</body>
</html>