<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'senti-analis';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if(isset($_POST['tombol'])){
        mysqli_query($conn, "insert into postings set
        posting = '$_POST[posting]';
        ");
        echo "Data Tersimpan";
    }

?>