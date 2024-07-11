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
                <h2>Users by Number of Reminders</h2>
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
                    <th>Number of Reminders</th>
                </tr>
        <? } ?>
    <?php
        foreach($data['reminders'] as $reminder) { ?>
        <tr>
            <td><?php echo $reminder['username']; ?></td>
            <td><?php echo $reminder['Number of Reminders']; ?></td>
        </tr>

        <? } ?>

    </table>
    </div>
</div>

<?php
    foreach($data['reminders'] as $reminder) {
        $username[] = $reminder['username'];
        $num_reminders[] = $reminder['Number of Reminders'];
    }
?>


<div class="container" style="height: 300px; width: 600px;">
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = <?php echo json_encode($username) ?>;
    const data = {
      labels: labels,
      datasets: [{
        data: <?php echo json_encode($num_reminders) ?>,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 159, 64)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(54, 162, 235)',
          'rgb(153, 102, 255)',
          'rgb(201, 203, 207)'
        ],
        borderWidth: 1
      }]
    };


    const config = {
      type: 'bar',
      data: data,
      options: {
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                title: {
                  display: true,
                  text: 'Number of Reminders'
                },
                beginAtZero: true,
                ticks: {
                  stepSize: 1
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Username'
                }
            }
        }
      },
    };

    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>

<?php require_once 'app/views/templates/footer.php' ?>