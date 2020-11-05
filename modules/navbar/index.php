<?php
if (@$_SESSION['islogin'] == 'true') {
    $displayFlag = 'none';
    $panelFlag = 'block';
} else {
    $panelFlag = 'none';
    $displayFlag = 'block';
}
include(dirname(__FILE__).'/../../libs/dal.php');
?>
<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end px-5" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active item_menu">
                <a class="nav-link" href="/index.php">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item item_menu">
                <a class="nav-link" href="#">About us</a>
            </li>
            <li class="nav-item item_menu">
                <a class="nav-link" href="#">contact</a>
            </li>
            <li class="nav-item dropdown item_menu">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <?php
                    $options = query("SELECT * FROM `category`", 'select');
                    foreach ($options as $key => $value) {
                        echo '<a class="dropdown-item" href="#">' . $value['name'] . '</a>';
                    }
                    ?>
                </div>
            </li>

            <li class="nav-item item_menu" style="display:<?php echo $panelFlag; ?>;">
                <a class="nav-link" href="../../admin\panel.php">Panel</a>
            </li>

            <li class="nav-item item_menu" style="display:<?php echo $panelFlag; ?>;">
                <a class="nav-link" href="../../logout.php">SignOut</a>
            </li>

            <li class="nav-item item_menu" style="display:<?php echo $displayFlag; ?>;">
                <a class="nav-link" href="/login.php">Login</a>
            </li>
            <li class="nav-item item_menu" style="display:<?php echo $displayFlag; ?>;">
                <a class="nav-link" href="/register.php">Register</a>
            </li>
        </ul>
    </div>
</nav>