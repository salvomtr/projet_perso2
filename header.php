<?php session_start(); ?>

<header>
    <nav>
        <ul>
            <li><a href="./hello-girls.php">Hello Girls !</a></li>
            <li><a href="./hello-boys.php">Hello Boys !</a></li>
            <li><a href="./secret.php">Secret !...</a></li>
            <li>
                <form action="./invert-theme.php">
                    <button type="submit">Invert theme</button>
                </form>
            </li>
            <?php if ($_SESSION['username']) { ?>
                <li>Hello "<?= $_SESSION['username'] ?>"</li>
                <li><a href="logout.php">Logout</a></li>
            <?php } else { ?>
                <li><a href="./login-display.php">Login</a></li>
            <?php } ?>
       </ul>
    </nav>
</header>