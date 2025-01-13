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
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $sql = "SELECT * FROM mhs_Haddad";
    $result = mysqli_query($koneksi, $sql);
    if(mysqli_num_rows($result)){
        $data = array();
        while ($row = mysqli_fetch_assoc($result)){
            $item = array(
                "id" => $row['id'],
                "npm" => $row['npm'],
                "nama" => $row['nama'],
                "kelas" => $row['kelas'],
            );
            $data[] = $item;
        }
        $response['status'] = 'Success';
        $response['data'] = $data;
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Tidak ada data dalam tabel mhs_Haddad.';
    }
} else {
    $response['status'] = 'error';
    $response['mesaage'] = 'Metode HTTP tidak valid.';
}
mysqli_close($koneksi);

echo json_encode($response); //mengirimkan respon dalam format JSON
?>