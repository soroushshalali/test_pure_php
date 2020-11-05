<?php
session_start();
ob_start();
if (@$_SESSION['islogin'] !== 'true') {
    header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="admin/ckeditor/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7b691a6b0e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php
    include(dirname(__FILE__) . '/modules/navbar/index.php');
    include(dirname(__FILE__) . '/libs/dal.php');
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            
        }
    ?>
    <a href="../logout.php" class="signout">signout</a>
    <div>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
            <input type="text" name="title">
            <textarea name="long_text" cols="30" rows="10"></textarea>
            <textarea name="short_text" cols="10" rows="2"></textarea>
            <select name="category_id">
                <?php
                $options = query("SELECT * FROM `category`");
                foreach ($options as $key => $value) {
                    echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                }
                ?>
            </select>
            <input type="submit" name="submit">
        </form>
    </div>
    <?php
    include(dirname(__FILE__) . '/modules/footer/index.php');

    ?>

    <script>
        CKEDITOR.replace('long_text');
        CKEDITOR.replace('short_text');
        $('document').ready(() => {

        })
    </script>
</body>

</html>