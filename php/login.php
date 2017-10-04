<?php
    require_once(__DIR__ . '/services/Authentication.php');
    require_once(__DIR__ . '/services/Defaults.php');

    $isLogged = Authentication::isLoggedIn();

    if ($isLogged)
        header("Location:" . Defaults::DEFAULT_BASE_URL);

    $username = $isLogged ? $_SESSION["Username"] : null;
?>

<!DOCTYPE HTML>
<html>
    <head>
        <!-- Include CSS -->
        <?php require(__DIR__ . '/../php/styles.php') ?>
        <title>Ricerca libri - Login</title>
    </head>
    <body>
        <!-- Include navbar section -->
        <?php require(__DIR__ . '/../php/partials/navbar.php') ?>
        <div class="container text-center">
            <?php
                if (isset($_GET['wrongCredentials'])) {
                    include(__DIR__ . '/../php/partials/messages/login-warn.php');
                }
            ?>
            <div class=" row">
                <div class="col-md-6 ml-md-auto mr-md-auto">
                    <?php
                        include(__DIR__ . '/../php/partials/login-form.php')
                    ?>
                </div>
            </div>
        </div>
        <!-- Include JS -->
        <?php require(__DIR__ . '/../php/scripts.php') ?>
    </body>
</html>