<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <style>
        form {
            margin: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 20px;
            border: 1px solid #E55A8Aff;
            border-radius: 20px;
            width: 300px;
            height: 500px;
            margin-top: 100px;
        }

        form h2 {
            background: linear-gradient(-90deg, #e55a8aff 30%, #7793ebff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        input {
            width: 200px;
            padding: 10px;
            border: 2px solid #E55A8Aff;
            border-radius: 20px;
        }

        input::placeholder {
            text-align: center;
        }

        input[type=submit] {
            background-color: #E55A8Aff;
            color: white;
            font-weight: 700;
            font-size: 20px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            border: 2px solid #7793ebff;
            background: transparent;
            cursor: pointer;
            color: #7793ebff;
            opacity: 0.8;
            transition: 0.3s;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .insert {
            margin-top: 20px;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>

    <?php
    include_once 'nav.php';
    include_once 'background.php';
    include_once 'database.php';

    $errors = array();

    if (isset($_POST['reg'])) {

        $firstname = trim($_POST['firstname']);
        $lastname = trim($_POST['lastname']);
        $email = trim($_POST['email']);
        $sanitizeEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
        $password = trim($_POST['password']);

        if (empty($firstname)) {
            $errors['firstname'] = 'First name is mandatory.<br>';
        }

        if (empty($lastname)) {
            $errors['lastname'] = 'Last name is mandatory.<br>';
        }

        if (!filter_var($sanitizeEmail, FILTER_SANITIZE_EMAIL)) {
            $errors['email'] = 'Email has to be a valid one.<br>';
        }
        if (empty($password)) {
            $errors['password'] = 'Password is mandatory.<br>';
        }

        if (count($errors) == 0) {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
            $query = "SELECT * FROM users WHERE email = '$sanitizeEmail'";

            $resultEmail = mysqli_query($conn, $query);

            if (mysqli_num_rows($resultEmail) > 0) {
                $errors['email'] = 'Email alredy taken';
            } else {
                $hashpassword = password_hash($password, PASSWORD_DEFAULT);

                $query = "INSERT INTO users (first_name,last_name, email, password)
                VALUES('$firstname', '$lastname', '$sanitizeEmail', '$hashpassword')";

                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo '<p class="insert"> Insert successfull  </p>';
                } else {
                    echo 'Something went wrong';
                }
            }
        }
    }



    ?>

    <form action="" method="POST" class="m-page scene_element scene_element--fadeinup">
        <h2>Sign up</h2>
        <input type="text" name="firstname" placeholder="First Name">
        <?php if (isset($errors['firstname'])) {
            echo '<p style="color: white"> ' . $errors['firstname'] . '</p>';
        } ?>
        <input type="text" name="lastname" placeholder="Last Name">
        <?php if (isset($errors['lastname'])) {
            echo '<p style="color: white"> ' . $errors['lastname'] . '</p>';
        } ?>
        <input type="text" name="email" placeholder="Email">
        <?php if (isset($errors['email'])) {
            echo '<p style="color: white"> ' . $errors['email'] . '</p>';
        } ?>
        <input type="password" name="password" placeholder="Password">
        <?php if (isset($errors['password'])) {
            echo '<p style="color: white"> ' . $errors['password'] . '</p>';
        } ?>

        <input type="submit" name="reg" value="Register">

    </form>

</body>

</html>