<?php require_once 'app/views/templates/header.php' ?>
<br>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1><?php echo "Hello, " . $_SESSION['username']; ?></h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>
<?php require_once 'app/views/templates/footer.php' ?>
