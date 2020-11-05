<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7b691a6b0e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .item_menu {
            transition: 0.4s;
        }

        .item_menu:hover {
            border-radius: 8px;
            background-color: rgba(144, 144, 252, 0.582);
            transition: 0.4s;
        }

        .carousel {
            background: #2f4357;
            margin-top: 20px;
        }

        .carousel-item {
            text-align: center;
            min-height: 280px;
            /* Prevent carousel from being distorted if for some reason image doesn't load */
        }

        .cat {}

        .cat>a {
            padding: 10px 30px;
            border: 2px solid #41f321;
            display: inline-block;
            margin: 10px;
            text-decoration: none;
            color: #41f321;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: 0.5s;
            position: relative;
            overflow: hidden;
        }

        .cat>a>span {
            border-radius: 50%;
            height: 30px;
            width: 30px;
            /* opacity: 0; */
            z-index: -1;
            display: block;
            position: absolute;
            background-color: red;
            transform: translate(-50%, -50%);
            transition: width 0.5s, height 0.5s;
            
        }

        .cat>a>span:hover {
            width: 500px;
            height: 500px;
            background-color: blue;
            opacity: 1;
        }
    </style>
</head>

<body>

    <?php
    include(dirname(__FILE__) . '/modules/navbar/index.php');
    ?>
    <main class="container px-0">
        <div class="row">
            <aside class="col-sm-4 py-3">
                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand">Navbar</a>
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </nav>

                <section>
                    <ul class="list-group">
                        <?php
                        $result = query("SELECT `id`, `title` FROM `articles` ORDER BY `views` DESC", 'select');
                        $counter = 0;
                        foreach ($result as $key => $value) {
                            if ($counter < 5) {
                                echo '
                                     <li class="list-group-item"><a href="article.php?id=' . $value['id'] . '">' . $value['title'] . '</a></li>
                                ';
                            }
                            $counter++;
                        }
                        ?>
                    </ul>
                </section>
                new
                <section>
                    <ul class="list-group">
                        <?php
                        $result = query("SELECT `id`, `title` FROM `articles` ORDER BY `created_at` DESC", 'select');
                        $counter = 0;
                        foreach ($result as $key => $value) {
                            if ($counter < 5) {
                                echo '
                                     <li class="list-group-item"><a href="article.php?id=' . $value['id'] . '">' . $value['title'] . '</a></li>
                                ';
                            }
                            $counter++;
                        }
                        ?>
                    </ul>
                </section>


            </aside>
            <div class="col-sm-8">
                <div class="container-lg my-3">
                    <div id="myCarousel" class="carousel slide px-5 shadow p-3 mb-5 rounded" data-ride="carousel">
                        <!-- Carousel indicators -->
                        <ol class="carousel-indicators">
                            <?php
                            $result = query("SELECT * FROM `articles`", 'select');
                            $counter = 0;
                            foreach ($result as $key => $value) {
                                if ($counter !== 0) {
                                    echo '
                        <li data-target="#myCarousel" data-slide-to="' . $key . '"></li>
                    ';
                                } else {
                                    echo '
                        <li data-target="#myCarousel" data-slide-to="' . $key . '" class="active"></li>
                    ';
                                }
                                $counter++;
                            }
                            ?>
                        </ol>
                        <!-- Wrapper for carousel items -->
                        <div class="carousel-inner">
                            <?php
                            $counter = 0;
                            foreach ($result as $key => $value) {
                                if ($counter !== 0) {
                                    echo '
                        <div class="carousel-item">
                            <h2>' . $value['title'] . '</h2>
                            <p>' . $value['short_text'] . '</p>
                            <a href="article.php?id=' . $value['id'] . '"  style="float:right;" >More</a>
                        </div>
                    ';
                                } else {
                                    echo '
                        <div class="carousel-item active" >
                            <h2>' . $value['title'] . '</h2>
                           ' . $value['short_text'] . '
                           <a href="article.php?id=' . $value['id'] . '" style="float:right;" >More</a>
                        </div>
                    ';
                                }
                                $counter++;
                            }
                            ?>
                        </div>

                    </div>
                </div>

                <div class='d-sm-flex flex-wrap cat'>
                    <?php
                    $result = query("SELECT * FROM `category`", 'select');

                    foreach ($result as $key => $value) {
                        echo '<a href="#"><span></span>' . $value["name"] . '</a><br>';
                    }
                    ?>

                </div>
    </main>

    <?php
    include(dirname(__FILE__) . '/modules/footer/index.php');
    ?>

    <script>
        $(document).ready(function() {
            $('.cat > a').on('mouseenter', function(e) {
                let x = e.pageX - $(this).offset().left;
                let y = e.pageY - $(this).offset().top;
                $(this).find('span').css({
                    "top": y,
                    "left": x,
                })
            });

            $('.cat > a').on('mouseout', function(e) {
                let x = e.pageX - $(this).offset().left;
                let y = e.pageY - $(this).offset().top;
                $(this).find('span').css({
                    "top": y,
                    "left": x,
                })
            })

        })
    </script>
</body>

</html>