<?php

include_once 'nav.php';
include_once 'database.php';

if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $conn = mysqli_connect('localhost', 'root', '', 'spotify');

    $query = "SELECT * FROM users WHERE email = '$email'";

    $results = mysqli_query($conn, $query);

    $records = mysqli_num_rows($results);
    $data_user = mysqli_fetch_array($results, MYSQLI_ASSOC);


    if ($records == 1) {
        if (password_verify($_POST['password'], $data_user['password'])) {
            echo '<p class="log"> You are logged in</p>';
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['firstname'] = $data_user['first_name'];
            $_SESSION['lastname'] = $data_user['last_name'];
            header('location: home.php');
        } else {
            echo '<p class="log"> Password does not match</p>';
        }
    } else {
        echo '<p class="log"> Wrong credentials </p>';
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form_log {
            margin: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 1px;
            border: 1px solid #E55A8Aff;
            border-radius: 20px;
            width: 300px;
            height: 300px;
            margin-top: 100px;
        }

        .form_log input {
            width: 200px;
            padding: 10px;
            border-radius: 20px;
        }

        .form_log input::placeholder {
            text-align: center;
        }

        .form_log input[type=submit] {
            background: linear-gradient(-90deg, #E55A8Aff 30%, #7793EBff 100%);
            color: white;
            font-weight: 700;
            font-size: 20px;
            cursor: pointer;
        }

        .log {
            margin-top: 20px;
            color: white;
            text-align: center;
        }

        .form_log input[type=submit]:hover {
            border: 2px solid #7793ebff;
            background: transparent;
            cursor: pointer;
            color: #7793ebff;
            opacity: 0.8;
            transition: 0.3s;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .form_log h2 {
            background: linear-gradient(-90deg, #e55a8aff 30%, #7793ebff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            padding-bottom: 30px;
        }
    </style>
</head>

<body>
    <form action="" method="POST" class="form_log m-page scene_element scene_element--fadeinup">
        <h2>Login</h2>

        <input type="email" name="email" placeholder="Email"><br>

        <input type="password" name="password" placeholder="Password"><br>

        <input type="submit" name="login" value="Log In">
    </form>

</body>

</html>