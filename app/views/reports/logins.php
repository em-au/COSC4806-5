<?php require_once 'app/views/templates/header.php' 
// IF NOT ADMIN, REDIRECT 
// if (!isset($_SESSION['admin'])) redirect)
?>

<!-- UPDATE BREADCRUMB PATH -->
<div class="container" style="margin-top: 5px">
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <? echo ucwords($_SESSION['controller'])?></li>
          </ol>
        </nav>
    </div>
</div>

<div class="container" style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
    <div style="width:700px">
    <div class="page-header" id="banner">
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h2>Users by Number of Logins</h2>
            </div>
        </div>
    </div>
    <br>

    <?php 
        if (empty($data['logins'])) { ?>
            <div class="alert alert-warning" role="alert">There are no logins</div>
        <? }
        else { ?>
            <table class="table align-middle" style="width:800px">
                <tr>
                    <th>Username</th>
                    <th>Number of Logins</th>
                </tr>
        <? } ?>
    <?php
        foreach($data['logins'] as $login) { ?>
        <tr>
            <td><?php echo $login['username']; ?></td>
            <td><?php echo $login['Number of Logins']; ?></td>
        </tr>

        <? } ?>

    </table>
    </div>
</div>
<?php require_once 'app/views/templates/footer.php' ?>