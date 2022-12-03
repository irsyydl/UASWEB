<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheets/login.css">
    <title>Registrasi</title>
</head>

<body>
    <div class="login-form">
        <h3>Registrasi Akun</h3>
        <form action="" method="post">
            <input type="text" name="email" placeholder="Email"> <br><br>
            <input type="text" name="username" placeholder="Username"> <br><br>
            <input type="password" name="password" placeholder="Password"> <br><br>
            <input type="password" name="konfirmasi" placeholder="Konfirmasi Password"> <br><br>
            <input type="submit" name="regis" value="Registrasi" class="registerbtn">
        </form>
        <p>Sudah punya akun?
            <a href="login.php">login</a>
        </p>
    </div>
</body>

</html>

<?php

    require 'config.php';
    if(isset($_POST['regis'])){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirmasi'];

        // Cek username telah digunakan atau belum
        $user = $db->query("SELECT * FROM akun WHERE username='$username'");
        
        if(mysqli_num_rows($user) > 0){
            echo "<script
                alert('Username sudah ada, gunakan username lain);
                </script>";
        } else {
            // Konfirmasi Password
            if($password == $konfirmasi){
                $password = password_hash($password, PASSWORD_DEFAULT);

                $query = "INSERT INTO akun (email, username, psw)
                            VALUES('$email', '$username', '$password')";
                $result = $db->query($query);

                if($result){
                    echo "<script>
                            alert('Registrasi Berhasil');
                        </script>";
                    header("Location:login.php");
                } else {
                    echo "<script>
                            alert('Registrasi Gagal');
                        </script>";
                }
            } else {
                echo "<script>
                        alert('Konfirmasi Password Salah');
                    </script>";

            }
        }
    }

?>