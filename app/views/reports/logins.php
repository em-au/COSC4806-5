<?php 
   ob_start();
    require_once 'app/views/templates/header.php'; 
    if (!isset($_SESSION['admin'])) {
        header('location: /home');
        ob_end_flush();
        die;
    }
?>

<div class="container" style="margin-top: 5px">
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item" aria-current="page"><a href="/reports">
                  <? echo ucwords($_SESSION['controller'])?></a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <? echo ucwords(str_replace("_", " ", $_SESSION['method']))?></li>
          </ol>
        </nav>

        <div class="page-header" id="banner">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div>
                    <h2>Users by Number of Logins</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="display:flex">
    <!-- Container for table -->
    <div class="container" style="text-align: center">
        <div>
            <?php 
                if (empty($data['logins'])) { ?>
                    <div class="alert alert-warning" role="alert">There are no logins</div>
                <? }
                else { ?>
                    <table class="table align-middle" style="width:400px">
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

    <!-- Container for chart -->
    <div class="container">
      <canvas id="myChart"></canvas>
    </div>
</div>
    
<?php // Limit to top 10?
    foreach($data['logins'] as $login) {
        $username[] = $login['username'];
        $num_logins[] = $login['Number of Logins'];
    }
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = <?php echo json_encode($username) ?>;
    const data = {
      labels: labels,
      datasets: [{
        data: <?php echo json_encode($num_logins) ?>,
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
                  text: 'Number of Logins'
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