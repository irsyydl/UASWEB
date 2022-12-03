<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
require 'config.php';

if(isset($_POST['submit'])) {   
    $name = $_POST['name'];
    $jumlah_roti = $_POST['jumlah_roti'];
    $nama_roti = $_POST['nama_roti'];

    $foto = $_FILES['foto']['name'];
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $foto_baru = "$name.$ekstensi";

    $tmp = $_FILES['foto']['tmp_name'];
    $tgl_upload = date('y-m-d');

    if(move_uploaded_file($tmp, 'foto/' . $foto_baru)){
        $query = "INSERT INTO users(name,jumlah_roti,nama_roti,foto,tanggal) VALUES('$name', '$jumlah_roti', '$nama_roti', '$foto_baru', '$tgl_upload')";
        $result = mysqli_query($mysqli, "INSERT INTO users(name,jumlah_roti,nama_roti,foto,tanggal) VALUES('$name','$jumlah_roti','$nama_roti','$foto_baru','$tgl_upload')");
    }
    header("Location:index.php");
}

?>
</body>
</html>