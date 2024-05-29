<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style1.css">
    <title>Login</title>
    <style>
        .form{
            width: 230px;
            height: 280px;
        }
    </style>
</head>
<body>

        <?php
            require('./connecticut.php');
            if (isset($_POST['login_button'])) {
                $_SESSION['validate']=false;
                $name=$_POST['name'];
                $password=$_POST['password'];
                $p=crudygobert::connect()->prepare('SELECT * FROM crudtable WHERE name=:n and pass=:p');
                $p->bindValue(':n',$name);
                $p->bindValue(':p',$password);
                $p->execute();
                $d=$p->fetchAll(PDO::FETCH_ASSOC);
                if ($p->rowCount()>0) {
                    $_SESSION['name']=$name;
                    $_SESSION['pass']=$password;
                    $_SESSION['validate']=true;
                    header('location:users.php');
                }else {
                    echo'Make sure that you are registered!';
                }

        }
        ?>
    <div class="form">
        <div class="title">
            <p>Login form</p>
        </div>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Name">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Login" name="login_button"> 
            <a href="./signup.php" style="position:relative; left:50px;top:-8px; font-size:14px">Click here to Sign Up</a>
        </form>
    </div>
</body>
</html>