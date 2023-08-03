<?php 

require_once __DIR__ . '/autoload.php' ;
$sentiment=new \PHPInsight\Sentiment(); 

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'senti-analis';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error connecting to database: " . mysqli_error_string($conn));
}

$query = $conn->query("SELECT * FROM postings");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Table Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="index.php" class="btn btn-primary mt-2">Kembali</a>
                <h5 class="mt-5">Tabel Sentiment</h5>
                <table class="table table-hover text-center mt-3" border="1">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th class="w-25">Judul Posting</th>
                            <th class="w-25">Banyak Komentar</th>
                            <th class="w-25">Negatif</th>
                            <th class="w-25">Positif</th>
                            <th class="w-25">Netral</th>
                            <th class="w-75">Grafik</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i=1;
                            while ($row = $query->fetch_assoc()) {
                                //hitung banyak komentar 
                                $id_posting = $row['id'];

                                $count_comment = $conn->query("SELECT count(idposting) as banyak FROM komentars")->fetch_row();

                                $komentar = $conn->query("SELECT komentar FROM komentars where idposting=$id_posting;");

                                $positif=0;
                                $negatif=0;
                                $netral=0;

                                while($komen = $komentar->fetch_assoc()){
                                    $kategori = $sentiment->categorise($komen['komentar']);
                                    if($kategori=='positif'){
                                        $positif++;
                                    } elseif($kategori=='negatif'){
                                        $negatif++;
                                    } elseif($kategori=='netral'){
                                        $netral++;
                                    }
                                }

                                
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['posting']; ?></td>
                                <td><?php echo $count_comment[0]; ?></td>
                                <td><?= $negatif; ?></td>
                                <td><?= $positif; ?></td>
                                <td><?= $netral; ?></td>
                                <td>
                                    <canvas id="myChart"></canvas>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-5">
                <h5>Tabel Komentar</h5>
                <table class="table table-hover text-center mt-3" border="1">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Posting</th>
                            <th scope="col">Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = $conn->query("SELECT * FROM komentars");
                            $i=1;
                            while ($row = $query->fetch_assoc()) {
                                
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row['idposting']; ?></td>
                                <td><?php echo $row['komentar']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<script>
  var ctx = document.getElementById('myChart');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Positif', 'Negatif', 'Netral'],
      datasets: [{
        label: 'Data',
        data: [
            <?php
                if($positif>$negatif && $positif>$netral){
                    $rata2=$positif;
                }
            ?>

        ],
        borderWidth: 1
      }]
    }
  });
</script>
</body>
</html>