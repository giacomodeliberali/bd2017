<?php
    require_once( __DIR__ . '/../../services/Defaults.php');
?>

<div class="row">
    <div class="col-md-6 ml-md-auto mr-md-auto">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" aria-label="Close">
                <span aria-hidden="true"><a href="<?php echo Defaults::DEFAULT_BASE_URL . '/php/add-book.php' ?>">&times;</a></span>
            </button>
            Something went wrong during the process. Please try again!
        </div>
    </div>
</div>