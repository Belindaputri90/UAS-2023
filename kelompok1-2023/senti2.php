<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Posting</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>

    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart(negatif, positif, netral) {
        var data = google.visualization.arrayToDataTable([
            ['Sentiment', 'Jumlah'],
            ['Negatif', negatif],
            ['Positif', positif],
            ['Netral', netral]
        ]);

        var options = {
            title: 'Sentiment Analysis',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
    </script>

    <?php
            require_once __DIR__ . '/autoload.php' ;
            $sentiment = new \PHPInsight\Sentiment();

            error_reporting(0);
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'senti-analis';

            $conn = new mysqli($servername, $username, $password, $dbname);
            if($conn->connect_error) {
                die("Error connecting to database: " . mysqli_error_string($conn));
            }
            $query = $conn->query("SELECT * FROM postings");
        ?>

    
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light border-radius-xl top-0 z-index-fixed shadow my-3 py-2 start-0 end-0 mx-4">
      <div class="container-fluid">
        <!-- <a class="navbar-brand">KELOMPOK 1</a> -->

        <!-- Button trigger modal -->
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
          KELOMPOK 1
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Anggota Kelompok</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Muftia Ryskina (2110005)</p>
                <p>Belinda Dwi Sukma Putri (2110218)</p>
                <p>Ihsan Setiyadi (2110024)</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
        <div class="collapse navbar-collapse justify-content-end">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="senti2.php">Table Sentiment</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="senti.php">Table Komentar</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="tablePosting.php">Table Posting</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<!-- NAVBAR -->

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <a href="index.php" class="btn btn-primary mt-2">Kembali</a>
                <h5 class="my-3">Tabel Posting</h5>
                <table class="table table-hover text-center mt-3" border="1">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul Posting</th>
                            <th scope="col">Banyak Komentar</th>
                            <th scope="col">Negatif</th>
                            <th scope="col">Positif</th>
                            <th scope="col">Netral</th>
                            <th scope="col">Rata-rata</th>
                            <th scope="col">Grafik</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;

                            while ($row=$query->fetch_assoc()){
                                // hitung banyak komen
                                $id_posting = $row['id'];
                                $count_comment = $conn->query("SELECT count(idposting) as banyak FROM komentars")->fetch_row();
                                $komentar = $conn->query("SELECT komentar FROM komentars where idposting=$id_posting;");
                                $class = $sentiment->categorise($string);
                                $positif = 0;
                                $negatif = 0;
                                $netral = 0;
           
                                // $jumlah_kat = 3;
                                while($komen = $komentar->fetch_assoc()){
                                    $kategori = $sentiment->categorise($komen['komentar']);
                                    if($kategori=='positif'){
                                        $positif++;
                                    }
                                    elseif($kategori=='negatif'){
                                        $negatif++;
                                    }
                                    elseif($kategori=='netral'){
                                        $netral++;
                                    }
                                }

                                if($positif>$negatif && $positif>$netral){
                                    $rata_rata_kategori = "Positif";
                                }
                                elseif($negatif>$positif && $negatif>$netral){
                                    $rata_rata_kategori = "Negatif";
                                }
                                else{
                                    $rata_rata_kategori = "Netral";
                                }
                                    ?>
                        <tr>
                            <td style="border: 2px solid black; text-align: center;"><?php echo $i++;?></td>
                            <td style="border: 2px solid black; text-align: center;"><?php echo $row['posting'];?></td>
                            <td style="border: 2px solid black; text-align: center;"><?php echo $count_comment[0];?></td>
                            <td style="border: 2px solid black; text-align: center;"><?php echo $negatif;?></td>
                            <td style="border: 2px solid black; text-align: center;"><?php echo $positif;?></td>
                            <td style="border: 2px solid black; text-align: center;"><?php echo $netral;?></td>
                            <td style="border: 2px solid black; text-align: center;"><?php echo $rata_rata_kategori;?></td>
                            <td style="width: 300px; height: 200px; border: 2px solid black; text-align: center;" id="piechart-<?php echo $row['id']; ?>">
                                <script type="text/javascript">
                                google.charts.setOnLoadCallback(function() {
                                    drawChart(<?php echo $negatif; ?>, <?php echo $positif; ?>,
                                        <?php echo $netral; ?>, '<?php echo $row['id']; ?>');
                                });

                                function drawChart(negatif, positif, netral, id_posting) {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Sentiment', 'Jumlah'],
                                        ['Negatif', negatif],
                                        ['Positif', positif],
                                        ['Netral', netral]
                                    ]);

                                    var options = {
                                        title: 'Sentiment Analysis',
                                        is3D: true,
                                    };

                                    var chart = new google.visualization.PieChart(document.getElementById('piechart-' +
                                        id_posting));
                                    chart.draw(data, options);
                                }
                                </script>
                            </td>

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>