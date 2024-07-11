<?php require_once 'app/views/templates/header.php' ?>
<br>
<div class="container" style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
    <div class="page-header" id="banner" style="width:700px">
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h2>Completed Reminders</h2>
            </div>
            <div >
                <a href="/reminders"><button type="button" class="btn btn-outline-primary">Return to current reminders</button></a>
            </div>
        </div>
    </div>
    <br>
    <?php 
        if (empty($data['reminders'])) { ?>
            <div class="alert alert-warning" role="alert">You have no completed reminders!</div>
        <? }
        else { ?>
            <table class="table align-middle" style="width:700px">
                <tr>
                    <th>Reminder</th>
                    <th>Created</th>
                    <th>Completed</th>
                </tr>
        <? } ?>
    <?php
        foreach($data['reminders'] as $reminder) { ?>
        <tr>
            <td align="left" style="width:300px"><?php echo $reminder['subject']; ?></td>
            <td><?php echo $reminder['created_at']; ?></td>
            <td><?php echo $reminder['completed_at']; ?></td>
        </tr>

        <? } ?>

    </table>                                             
</div>
<?php require_once 'app/views/templates/footer.php' ?>