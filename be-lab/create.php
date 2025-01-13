<?php
header('Content-Type: application/json'); //mengatur header untuk mengindikasikan bahwa respon adalah json
// mengizinkan permintaan dari domain React yang berjalan di http/localhost:3000
header('Access-Control-Allow-Origin: http://localhost:3000');
// mengizinkan metode HTTP yang diizinkan 
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
// mengizinkan header yang diizinkan 
header('Access-Control-Allow-Headers: Content-Type, Authorization');
// Pastikan metode OPTIONS mendapatkan respon yang benar
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS'){
    http_response_code(200);
    exit;
}
header('Content-Type: application/json'); //mengatur header untuk mengindikasikan bahwa respon adalah JSON
require('connection.php');

$response = array(); //inisialisasi array respons

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $sql = "INSERT INTO mhs_Haddad (npm, nama, kelas) VALUES ('$npm', '$nama', '$kelas')";

    if (mysqli_query($koneksi, $sql)){
        $response['status'] = 'success';
        $response['message'] = 'Data berhasil ditambahkan';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error ' . $sql . '<br>' . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);

echo json_encode($response); //mengirimkan respon dalam format JSON
?>