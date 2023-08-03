<?php
  $servername = 'localhost';
  $username = 'root';
  $password = '';
  $dbname = 'senti-analis';

  $conn = new mysqli($servername, $username, $password, $dbname);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Frontend Kecerdasan Buatan dan Webservice</title>
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
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="senti2.php">Table Sentiment</a>
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

  <div class="container my-5" id="home">

        <div class="row">
          <div class="col-12">
            <div class="card mt-5">
              <div class="card-body">
                <h5 class="card-title">Data Posting</h5>

                <form action="posting.php" method="post">
                <div class="mb-3">
                  <label class="form-label">Judul Postingan</label>
                  <input type="text" name="posting" class="form-control" placeholder="Input Judul Postingan">
                </div>
                <button type="submit" name="tombol" value="posting" class="btn btn-primary mb-2">Simpan</button>
              </form>

                <a href="senti2.php" class="card-link text-decoration-none">Lihat Tabel Data</a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card mt-5">
              <div class="card-body">
                <h5 class="card-title">Data Komentar</h5>

                <form action="komentar.php" method="post">
                  <div class="mb-3">
                    <label class="form-label">Komentar</label>
                    <input type="text" name="komentar" class="form-control" placeholder="Input Komentar">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">ID Postingan</label>
                    <select class="form-select" aria-label="Default select example" name="idposting">
                      <option selected>Pilih Postingan</option>
                      <?php 
                        $result = $conn->query("SELECT id FROM postings");
                        if($result->num_rows>0){
                            while($optionData=$result->fetch_assoc()){
                            $option =$optionData['id'];
                        ?>

                        <?php
                          //selected option
                          if(!empty($id) && $id== $option){
                          // selected option
                        ?>
                      <option value="<?php echo $option; ?>" selected><?php echo $option; ?> </option>
                        <?php 
                          continue;
                      }?>
                        <option value="<?php echo $option; ?>" ><?php echo $option; ?> </option>
                        <?php
                          }}
                        ?>
                    </select>
                  </div>
                <button type="submit" name="tombol" value="komentar" class="btn btn-primary mb-2">Simpan</button>
              </form>

                <a href="senti.php" class="card-link text-decoration-none">Lihat Tabel Data</a>
              </div>
            </div>
          </div>
        </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>