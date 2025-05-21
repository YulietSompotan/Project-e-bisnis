<?php
session_start();
// koneksi ke database
$host_db = "localhost";
$usen_db = "root";
$pass_db = "";
$nama_db = "ebisnis";
$koneksi = mysqli_connect($host_db, $usen_db, $pass_db, $nama_db);

//variabel
$err ="";
$username = "";
$ingataku = "";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ingataku = $_POST['ingataku'] ?? null;

    if($username == '' || $password == ''){
        $err .= "<li>Please enter your username and password.</li>";
    }else{
        $sql1 = "select * from user where username = '$username'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);

        if (!$r1) {
    $err .= "<li>Username <b>$username</b> is not registered</li>";
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
          <span class="icon"><i class="fas fa-user"></i></span>
          <input type="text" name="username" required />
          <label>Username</label>
        </div>

        <div class="input-box">
          <span class="icon"><i class="fas fa-lock"></i></span>
          <input type="password" name="password" required />
          <label>Password</label>
        </div>

        <button type="submit">Login</button>

        <div class="register-link">
          <p>Don't have an account? <a href="#">Register</a></p>
        </div>
      </form>
    </div>

    <!-- Particle.js script -->
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
      // Particle.js config
      particlesJS("particles-js", {
        particles: {
          number: { value: 80, density: { enable: true, value_area: 800 } },
          color: { value: "#ffffff" },
          shape: { type: "circle" },
          opacity: { value: 0.5 },
          size: { value: 3 },
          line_linked: {
            enable: true,
            distance: 150,
            color: "#ffffff",
            opacity: 0.4,
            width: 1,
          },
          move: { enable: true, speed: 3 },
        },
        interactivity: {
          detect_on: "canvas",
          events: {
            onhover: { enable: true, mode: "grab" },
            onclick: { enable: true, mode: "push" },
            resize: true,
          },
        },
        retina_detect: true,
      });
    </script>
  </body>
</html>