<?php
session_start();
// atur koneksi ke database
$host_db = "localhost";
$usen_db = "root";
$pass_db = "";
$nama_db = "ebisnis";
$koneksi = mysqli_connect($host_db, $usen_db, $pass_db, $nama_db);

//atur variabel
$err ="";
$username = "";
$ingataku = "";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ingataku = $_POST['ingataku'] ?? null;

    if($username == '' or $password == ''){
        $err .="<li>Silakan masukan username dan password</li>";
    }else{
        $sql1 = "select * from user where username = '$username'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);

        if (!$r1) {
    $err .= "<li>Username <b>$username</b> tidak terdaftar</li>";
} elseif ($r1['password'] != md5($password)) {
    $err .= "<li>Password salah.</li>";
}


        if(empty($err)){
            $_SESSION['session_username'] = $username; //server
            $_SESSION['session_password'] = md5($password);

            if($ingataku == 1){
                $cookie_name = "cookie_username";
                $cookie_value = $username;
                $cookie_time = time() + 60 * 60 * 24 * 30; // 30 hari
                setcookie($cookie_name, $cookie_value,$cookie_time,"/");

                $cookie_name = "cookie_password";
                $cookie_value = md5($password);
                $cookie_time = time() + 60 * 60 * 24 * 30; // 30 hari
                setcookie($cookie_name, $cookie_value,$cookie_time,"/");
            }
            header("location:dashboard.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <meta https-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,
        initial-scale=1.0">
        <link rel="stylesheet" href="css/styles.css" />
    </head>
    <body>
        <div class="login-box">

         <?php if($err){ echo "<ul style='color:red;'>$err</ul>"; } ?>

            <form method="POST" action="login.php">
    <h2>Login</h2>
    <div class="input-box">
        <span class="icon"><ion-icon name="person-circle"></ion-icon></span>
        <input type="text" name="username" required>
        <label>Username</label>
    </div>
    <div class="input-box">
        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
        <input type="password" name="password" required>
        <label>Password</label>
    </div>
    <div class="remember">
        <label><input type="checkbox" name="ingataku" value="1"> Ingat saya</label>
    </div>
    <button type="submit" name="login">Login</button>
</form>
        </div>

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>