<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <style>
        body {
            color: white;

        }

        .title {
            color: #F2994A;
        }

        section {
            margin: auto;
            margin-top: 50px;
            width: 70%;
        }

        .h2 {
            margin-top: 30px;
        }

        p {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php
    include_once 'nav.php';
    include_once 'database.php';


    ?>
    <section>

        <h2 class="title"><?php
                            if (isset($_SESSION['email'])) {

                                echo ' Welcome ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] . '!';
                            };

                            ?>
        </h2>
        <h2 class="h2">Account details:</h2>
        <p>First Name : <?php
                        if (isset($_SESSION['email'])) {
                            echo $_SESSION['firstname'];
                        };

                        ?>

        </p>
        <p>Last Name : <?php
                        if (isset($_SESSION['email'])) {
                            echo $_SESSION['lastname'];
                        };

                        ?>

        </p>
        <p>Email: <?php
                    if (isset($_SESSION['email'])) {
                        echo $_SESSION['email'];
                    };

                    ?>

        </p>

    </section>





</body>

</html>