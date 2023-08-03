<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8000/api/komentars',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "komentar":"'.$_POST['komentar'].'",
    "idposting":"'.$_POST['idposting'].'"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

 if ($response)
	{
		echo "<script>
			alert ('Data Komentar Berhasil Disimpan');
			location.href='index.php';
		</script>";	
	}
	else
	{
		echo "<script>
			alert ('Gagal Menambah Data Komentar');
			location.href='index.php';
		</script>";		
	}
