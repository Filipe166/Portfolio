<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Outline&display=swap" rel="stylesheet">
</head>

<body>

    <?php
    session_start();
    if (isset($_POST['logout'])) {
        unset($_SESSION['email']);
        echo 'logged out';
        header('location: home.php');
        exit();
    }


    ?>

    <section class="ani">

        <section class="nav_bar">
            <nav>
                <div class="nav m-header scene_element scene_element--fadeinup">
                    <h1 class="h1_title">My<span>Songs</span> </h1>
                    <ul class="nav_ul m-scene" id="main">
                        <div class="menu m-header scene_element scene_element--fadein">
                            <li class="navHover" class="line"><a href="home.php">Home</a>
                                <div class="line"></div>
                            </li>
                            <li class="navHover" class="line"><a href="songs.php">Songs</a>
                                <div class="line"></div>
                            </li>
                            <li class="navHover" class="line"><a href="artists.php">Artists</a>
                                <div class="line"></div>
                            </li>
                            <li class="navHover" class="line"><a href="playlists.php">Playlists</a>
                                <div class="line"></div>
                            </li>
                        </div>
                </div>
                <div class="register m-right-panel m-page scene_element scene_element--fadeinright">
                    <?php
                    if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
                        echo '<form action="" method="POST">
                        <input type="submit" value="Logout" name="logout" class="logout">
                        </form>';
                        echo '<div class="vl"></div>';
                        echo '<li><a href="account.php">Account</a></li>';
                    } else {
                        echo '
                        <li class="registerBtn"><a href="register.php">Register</a></li>' .
                            '<div class="vl"></div>' .
                            '<li class="login"><a href="login.php">Login</a></li>';
                    }
                    ?>
                </div>
                </ul>
            </nav>
        </section>

        <section class="section">
            <div class="btn_home m-header scene_element scene_element--fadein">
                <?php
                if (!isset($_SESSION['email']) && empty($_SESSION['email'])) {
                    echo ' <button><a href="register.php">Register</a></button>';
                }
                ?>
                <h1 class="title">Playing the <br><span class="want">Music you Want</span></h1>
            </div>
            <div class="blur m-right-panel m-page scene_element scene_element--fadeinright">
                <div class="inside"></div>
                <div class="outCircle circle">
                    <div class="outCircle2 circle ">
                        <div class="outCircle3 circle">
                            <div class="outCircle4 circle">
                                <div class="outCircle5 circle ">
                                    <div class="innerCircle circle">
                                        <div class="arrow-right"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <div class='light x1'></div>
        <div class='light x2'></div>
        <div class='light x3'></div>
        <div class='light x4'></div>
        <div class='light x5'></div>
        <div class='light x6'></div>
        <div class='light x7'></div>
        <div class='light x8'></div>
        <div class='light x9'></div>
    </section>
</body>

</html>