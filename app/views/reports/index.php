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

<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">
                <p><i class="fa-solid fa-bell fa-2xl" ></i></p>
                <? echo "Total Reminders: " . $data['num_all_reminders']?></h5>
            <p class="card-text">
                Click the button below to see all incomplete and complete reminders for all users</p>
            <a href="reports/all_reminders"><button type="button" class="btn btn-primary">
                All reminders</button></a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a short card.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
          </div>
        </div>
      </div>
    </div>
</div>


<a href="reports/all_reminders">See all reminders</a><br>
<a href="reports/most_reminders">See users by number of reminders</a><br>
<a href="reports/num_logins">See users by number of logins</a>
<?php require_once 'app/views/templates/footer.php' ?>