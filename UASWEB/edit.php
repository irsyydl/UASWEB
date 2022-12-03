<?php
require 'config.php';

$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $jumlah_roti = $res['jumlah_roti'];
    $nama_roti = $res['nama_roti'];
}
?>

<?php
if(isset($_POST['update']))
{   
    $id = $_POST['id'];
    $name=$_POST['name'];
    $jumlah_roti=$_POST['jumlah_roti'];
    $nama_roti=$_POST['nama_roti']; 
    
    if(empty($name) || empty($jumlah_roti) || empty($nama_roti)) {          
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($jumlah_roti)) {
            echo "<font color='red'>jumlah_roti field is empty.</font><br/>";
        }
        
        if(empty($nama_roti)) {
            echo "<font color='red'>nama_roti field is empty.</font><br/>";
        }       
    } else {    
        $result = mysqli_query($mysqli, "UPDATE users SET name='$name',jumlah_roti='$jumlah_roti',nama_roti='$nama_roti' WHERE id=$id");
        
        header("Location: index.php");
    }
}
?>

<html>
<head>  
    <link rel="stylesheet" href="stylesheets/form.css">
    <title>Edit Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" class="form" action="edit.php">
            <h2>Update</h2>
            <p type="Nama"><input type="text" name = "name" placeholder="Tuliskan nama anda" value="<?php echo $name;?>"></input></p>
            <p type="Umur"><input type="text" name = "jumlah_roti" placeholder="Masukkan umur anda" value="<?php echo $jumlah_roti;?>"></input></p>
            <p type="nama_roti"><input type="text" name = "nama_roti" placeholder="Masukkan nama_roti anda" value="<?php echo $nama_roti;?>"></p>
            <p type="Foto"><input type="file" name="foto"></p>
            <p><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></p>
            <button type='submit' value='submit' name='submit'>Submit</button>
    </form>
</body>
</html>