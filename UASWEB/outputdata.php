<?php

use LDAP\Result;

session_start();
if (!isset($_SESSION['login'])) {
    echo "<script>
                alert('Akses Ditolak, Silahkan Login');
                document.location.href='login.php';
            </script>";
}
?>

<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>
    <link rel="stylesheet" href="stylesheets/table.css">
    <title>Homepage</title>
</head>

<body>
    <div class="container">
        <div class="topbar">
            <input type="text" id="search" placeholder="Cari apa?">
        </div>
        <br> <br>
        <table width='80%' border=0 id="myTable">
            <tbody>
                <tr bgcolor='#55608f'>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Usia</td>
                    <td>Foto</td>
                    <td>Tgl Daftar</td>
                    <td>Update</td>
                </tr>
            </tbody>
            <?php
            //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
            while ($res = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $res['name'] . "</td>";
                echo "<td>" . $res['jumlah_roti'] . "</td>";
                echo "<td>" . $res['nama_roti'] . "</td>";
                echo "<td><img width=80 height=80 src='foto/" . $res['foto'] . "' /></td>";
                echo "<td>" . $res['tanggal'] . "</td>";
                echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
            }
            ?>
        </table>
    </div>
</body>

<script>
    document.querySelector('#search').addEventListener('input', filterList)

    function filterList(){
        const searchInput = document.querySelector('#search')
        const filter = searchInput.value.toLowerCase()
        const listItems = document.querySelectorAll('$res')

        listItems.forEach((item) => {
            let text = item.textContent
            if(text.toLowerCase().includes(filter.toLowerCase())){
                item.style.display = '';
            }
            else {
                item.style.display = 'none';
            }
        })
    }
</script>
</html>

