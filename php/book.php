<?php
    require_once(__DIR__ . '/services/AuthenticationService.php');
    require_once(__DIR__ . '/services/Defaults.php');
    require_once(__DIR__ . '/services/BooksService.php');



    if (!AuthenticationService::isLoggedIn() || !isset($_GET["id"]))
        header("Location:" . Defaults::DEFAULT_BASE_URL);

    $book = BooksService::getBook($_GET["id"]);
    $reviews = BooksService::getReviews($_GET["id"]);
?>

<!DOCTYPE HTML>
<html>
    <head>
        <!-- Include CSS -->
        <?php require(__DIR__ . '/partials/styles.php') ?>
        <!-- Include JS -->
        <?php require(__DIR__ . '/partials/scripts.php') ?>
        <title>Ricerca libri - Book details</title>
    </head>
    <body>
        <!-- Include navbar section -->
        <?php require(__DIR__ . '/../php/partials/navbar.php') ?>
        <div class="container">

            <?php
                if (!$book) {
                    include(__DIR__ . '/../php/partials/messages/book-not-found.php');
                    die();
                }
            ?>

            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="<?php echo $book->image; ?>" height="200" style="margin-left: -15px;"/>
                        </div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h4><?php echo $book->title; ?><small>&nbsp;<?php echo $book->author; ?></small></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <i><?php echo $book->genre; ?></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <?php
                        include(__DIR__ . '/partials/review-form.php');
                    ?>
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-xs-12">
                    <h5>Reviews</h5>
                    <?php
                        if ($reviews) {
                            foreach ($reviews as $review) {
                                $review->getTemplate();
                            }
                        }else{
                            include(__DIR__ . '/partials/messages/no-reviews.php');
                        }
                    ?>
                </div>
            </div>


        </div>
    </body>
</html>