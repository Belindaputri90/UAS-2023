<?php 

require_once __DIR__ . '/autoload.php' ;
$sentiment=new \PHPInsight\Sentiment(); 
error_reporting(0);
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
  </head>
<body>
    
  <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
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
              <a class="nav-link" href="senti2.php">Table Sentiment</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="senti.php">Table Komentar</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="tablePosting.php">Table Posting</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <!-- NAVBAR -->

<div class="container my-5">
        <div class="row">
            <div class="col-12">
                <a href="index.php" class="btn btn-primary mt-5">Kembali</a>
                    <h5 class="my-3">Tabel Komentar</h5>
                    <table class="table table-hover text-center mx-auto p-1" border="1">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col" class="w-25">ID Posting</th>
                                <th scope="col">Posting</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $query = $conn->query("SELECT * FROM postings");
                                $i=1;
                                while ($row = $query->fetch_assoc()) {
                                    
                            ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['posting']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            </div>
        </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>