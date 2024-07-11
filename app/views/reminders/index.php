<?php require_once 'app/views/templates/header.php' ?>

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
    
    <div>
    <div class="page-header" id="banner" >
        <div style="display: flex; align-items: center; justify-content: space-between">
            <div>
                <h2>Reminders</h2>
            </div>
            <div >
                <a href="/reminders/completed_reminders"><button type="button" class="btn btn-outline-primary">Completed reminders</button></a>
                <a href="/reminders/create_form"><button type="button" class="btn btn-primary">Add</button></a>
            </div>
        </div>
    </div>
    <br>
    
    <table class="table align-middle bottom-bordered"> 
    <?php
        if (empty($data['reminders'])) { ?>
            <div class="alert alert-warning" role="alert">You currently have no reminders!</div>
        <? }
        foreach($data['reminders'] as $reminder) { ?>
        <tr>
            <td align="left" style="width:400px"><?php echo $reminder['subject']; ?></td>
            <td align="right" style="width: 200px;">
                <a href="/reminders/update_form/?id=<?php echo $reminder['id']; ?>"><button type="button" class="btn btn-outline-primary"><i class="fa-solid fa-pencil"></i></button></a>
                <a href="/reminders/complete/?id=<?php echo $reminder['id']; ?>"><button type="button" class="btn btn-outline-success"><i class="fa-solid fa-check"></i></button></a>
                <a href="/reminders/delete/?id=<?php echo $reminder['id']; ?>"><button type="button" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button></a>
            </td>
        </tr>
        <? } ?>

    </table>
    </div>
</div>
<?php require_once 'app/views/templates/footer.php' ?>