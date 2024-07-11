<?php 
   ob_start();
    require_once 'app/views/templates/header.php'; 
    if (!isset($_SESSION['admin'])) {
        header('location: /home');
        ob_end_flush();
        die;
    }
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

<div class="container" style="display: flex; flex-direction: column; justify-content: center; align-items: center">
    <div style="width:700px">
    <div class="page-header" id="banner">
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h2>All Reminders</h2>
            </div>
        </div>
    </div>
    <br>
      
    <?php 
        if (empty($data['reminders'])) { ?>
            <div class="alert alert-warning" role="alert">There are no reminders</div>
        <? }
        else { ?>
            <table class="table align-middle" style="width:800px">
                <tr>
                    <th>Username</th>
                    <th>Reminder</th>
                    <th>Completed</th>
                    <th>Created</th>
                </tr>
        <? } ?>
    <?php
        foreach($data['reminders'] as $reminder) { ?>
        <tr>
            <td><?php echo $reminder['username']; ?></td>
            <td align="left"><?php echo $reminder['subject']; ?></td>
            <td><?php if ($reminder['completed'] == 1) echo "Yes";
              else echo "No";?></td>
            <td><?php echo $reminder['created_at']; ?></td>
        </tr>

        <? } ?>

    </table>
    </div>
</div>
<a href="reports/most_reminders">See users by number of reminders</a><br>
<a href="reports/num_logins">See users by number of logins</a>
<?php require_once 'app/views/templates/footer.php' ?>