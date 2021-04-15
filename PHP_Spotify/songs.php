<?php

include_once 'nav.php';
include_once 'background.php';
include_once 'database.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn) {

    $query = 'SELECT * FROM songs INNER JOIN artists ON artists.artist_id = songs.artist_id';

    $results = mysqli_query($conn, $query);

    $songs = mysqli_fetch_all($results, MYSQLI_ASSOC);

    if (isset($_POST['songName'])) {
        $query = 'SELECT * FROM songs INNER JOIN artists ON artists.artist_id = songs.artist_id ORDER BY title';
        $results = mysqli_query($conn, $query);
        $songs = mysqli_fetch_all($results, MYSQLI_ASSOC);
    }
    if (isset($_POST['artistName'])) {
        $query = 'SELECT * FROM songs INNER JOIN artists ON artists.artist_id = songs.artist_id ORDER BY name';
        $results = mysqli_query($conn, $query);
        $songs = mysqli_fetch_all($results, MYSQLI_ASSOC);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Songs</title>
    <style>
        article {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 0;
            flex-wrap: wrap;
            width: 80%;
            margin: auto;

        }

        .card {

            position: relative;
            width: 320px;
            height: 400px;
            color: #fff;
            background: #111;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 30px;
            transition: 0.5s;
        }

        .card:hover {
            transform: translateY(-20px);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(315deg, #7793ebff 50%, #e55a8aff 10%);
        }

        .card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(315deg, #7793ebff 50%, #e55a8aff 100%);
            filter: blur(20px);

        }

        .card:nth-child(1)::before,
        .card:nth-child(1)::after {
            background-image: linear-gradient(to right, #ff758c 0%, #ff7eb3 100%);
        }

        .card:nth-child(3)::before,
        .card:nth-child(3)::after {
            background-image: linear-gradient(to top, #ff0844 0%, #ffb199 100%);
        }

        .card:nth-child(3)::before,
        .card:nth-child(3)::after {
            background-image: linear-gradient(45deg, #93a5cf 0%, #e4efe9 100%);
        }

        .card:nth-child(4)::before,
        .card:nth-child(4)::after {
            background-image: linear-gradient(to top, #7028e4 0%, #e5b2ca 100%);
        }

        .card:nth-child(5)::before,
        .card:nth-child(5)::after {
            background-image: linear-gradient(to top, #d9afd9 0%, #97d9e1 100%);
        }

        .card:nth-child(6)::before,
        .card:nth-child(6)::after {
            background-image: linear-gradient(to top, #f43b47 0%, #453a94 100%);
        }

        .card:nth-child(7)::before,
        .card:nth-child(7)::after {
            background-image: linear-gradient(to top, #9795f0 0%, #fbc8d4 100%);
        }

        .card:nth-child(8)::before,
        .card:nth-child(8)::after {
            background-image: linear-gradient(to top, #00c6fb 0%, #005bea 100%);
        }

        .card:nth-child(9)::before,
        .card:nth-child(9)::after {
            background-image: linear-gradient(to top, #0ba360 0%, #3cba92 100%);
        }

        .card:nth-child(10)::before,
        .card:nth-child(10)::after {
            background-image: linear-gradient(to top, #feada6 0%, #f5efef 100%);
        }

        .card:nth-child(11)::before,
        .card:nth-child(11)::after {
            background-image: linear-gradient(to top, #37ecba 0%, #72afd3 100%);
        }

        .card:nth-child(12)::before,
        .card:nth-child(12)::after {
            background-image: linear-gradient(to right, #6a11cb 0%, #2575fc 100%);
        }

        .card:nth-child(13)::before,
        .card:nth-child(13)::after {
            background-image: linear-gradient(180deg, #2af598 0%, #009efd 100%);
        }

        .card:nth-child(14)::before,
        .card:nth-child(14)::after {
            background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card:nth-child(15)::before,
        .card:nth-child(15)::after {
            background-image: linear-gradient(to top, #fddb92 0%, #d1fdff 100%);
        }

        .card:nth-child(16)::before,
        .card:nth-child(16)::after {
            background-image: linear-gradient(to top, #d299c2 0%, #fef9d7 100%);
        }

        .card span {
            position: absolute;
            top: 6px;
            left: 6px;
            right: 6px;
            bottom: 6px;
            background: rgba(0, 0, 0, 0.7);
            z-index: 2;
        }

        .card span::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background: rgba(255, 255, 255, 0.2);
            pointer-events: none;
        }

        .card .content {
            position: relative;
            z-index: 10;
            padding: 20px 40px;
        }

        .content img {
            width: 100%;
            height: 200px;

        }

        .songs {
            margin-top: 100px;
        }

        .songs h2 {
            background: linear-gradient(-90deg, #E55A8Aff 30%, #7793EBff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            width: 70%;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;

        }

        #form {
            width: 70%;
            margin: auto;
            display: flex;
            justify-content: left;
            align-items: center;
        }


        #artName {
            background: linear-gradient(-90deg, #E55A8Aff 30%, #7793EBff 100%);
            border: 1px solid black;
            border-radius: 20px;
            color: white;
            width: 180px;
            padding: 10px;
            margin-top: 20px;
            cursor: pointer;


        }

        #songName {

            background: linear-gradient(-90deg, #E55A8Aff 30%, #7793EBff 100%);
            border: 1px solid black;
            border-radius: 20px;
            color: white;
            width: 180px;
            padding: 10px;
            margin-top: 20px;
            cursor: pointer;

        }
    </style>
</head>

<body>
    <section class="songs">
        <h2>The Songs List</h2>
        <form action="" method="POST" id="form">
            <input type="submit" name="artistName" id="artName" value="Sort By Artist Name">
            <input type="submit" name="songName" id="songName" value="Sort By Song Name">
        </form>

        </div>
        <article>
            <?php foreach ($songs as $song) : ?>
                <div class="card m-header scene_element scene_element--fadein">
                    <span></span>
                    <div class="content">
                        <img src="<?= $song['picture'] ?>" ; alt="">
                        <div>
                            <strong>Title :</strong>
                            <?= $song['title']; ?>
                        </div>
                        <br>
                        <div>
                            <strong>Date of release :</strong>
                            <?= $song['release_date']; ?>
                        </div>
                        <br>
                        <div>
                            <strong>Artist Name : </strong>
                            <?= $song['name']; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </article>


    </section>


</body>

</html>