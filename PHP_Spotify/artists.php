<?php
require_once 'database.php';
require_once 'nav.php';
require_once 'background.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn) {

    $query = 'SELECT *, COUNT(*) AS allSongs from artists INNER JOIN songs on artists.artist_id = songs.artist_id GROUP BY songs.artist_id';

    $results = mysqli_query($conn, $query);

    $artists = mysqli_fetch_all($results, MYSQLI_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artists</title>
    <style>
        .art {
            margin-top: 100px;
        }

        article {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 0;
            flex-wrap: wrap;
            width: 80%;
            margin: auto;
            margin-top: 48px;

        }

        h3 {
            font-size: 40px;
            background-image: linear-gradient(to top, #7028e4 0%, #e5b2ca 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
            padding-bottom: 10px;
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

        .card:nth-child(2)::before,
        .card:nth-child(2)::after {
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
            width: 50%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            pointer-events: none;
        }

        .card .content {
            position: relative;
            z-index: 10;
            padding: 20px 40px;
        }
    </style>
</head>

<body>

    <section class="art ">
        <h3>The Artists List </h3>
        <article>
            <?php foreach ($artists as $artist) :
            ?>
                <div class="card m-header scene_element scene_element--fadein">
                    <span></span>
                    <div class="content m-header scene_element scene_element--fadein">
                        <div>
                            <strong>Name :</strong>
                            <?= $artist['name']; ?>
                        </div>
                        <br>
                        <div>
                            <strong>Bio :</strong>
                            <?= $artist['bio']; ?>
                        </div>
                        <br>
                        <div>
                            <strong>Gender :</strong>
                            <?= $artist['gender']; ?>
                        </div>
                        <br>
                        <div>
                            <strong>How many songs created :</strong>
                            <?= $artist['allSongs']; ?>
                        </div>


                    </div>
                </div>
            <?php endforeach; ?>
        </article>
    </section>


</body>

</html>