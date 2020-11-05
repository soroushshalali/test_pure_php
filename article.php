<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7b691a6b0e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php
    include(dirname(__FILE__) . '/modules/navbar/index.php');
    include(dirname(__FILE__).'/libs/dal.php');
    $id=$_GET['id'];
    query("UPDATE `articles` SET `views`= `views`+1 WHERE `id`={$id}");
    $query="SELECT `id` , `title`, `long_text`, `author_id`, `category_id`, `created_at` FROM `articles` WHERE `id`={$id}";
    $result=query($query);
    ?>


    <main class="container px-0">
        <div class="row">
            <aside class='col-sm-3'>as</aside>
            <section class='col-sm-9'>
                <article>
                    <h1><?php echo $result[0]['title'] ?></h1>
                    <p><?php echo $result[0]['long_text'] ?></p>
                    <div>
                        <h5><?php echo $result[0]['author_id'] ?></h5>
                        <h6><?php echo $result[0]['created_at'] ?></h6>
                    </div>
                    <a href="">DEL</a>
                    <a href="update.php?id=<?php echo $result[0]['id'] ?>">UPDATE</a>
                </article>
            </section>
        </div>
    </main>





    <?php
    include(dirname(__FILE__) . '/modules/footer/index.php');
    ?>
</body>

</html>