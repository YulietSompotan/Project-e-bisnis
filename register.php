<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "ebisnis";

$conn = mysqli_connect($host, $user, $pass, $dbname);
$error = "";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        $error = "Password and confirmation do not match!";
    } else {
        $check = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
        if (mysqli_num_rows($check) > 0) {
            $error = "Username is already taken.";
        } else {
            $hashedPassword = md5($password); 
            $query = "INSERT INTO user (username, password) VALUES ('$username', '$hashedPassword')";
            if (mysqli_query($conn, $query)) {
                header("Location: login.php?success=1");
                exit();
            } else {
                $error = "An error occurred: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="css/styles.css"/>
  <title>Register</title>
</head>
<body>
  <div class="login-box">
    <?php if ($error): ?>
      <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="">
      <h2>Register</h2>

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

      <div class="input-box">
        <span class="icon"><i class="fas fa-lock"></i></span>
        <input type="password" name="confirm_password" required />
        <label>Confirm Password</label>
      </div>

      <button type="submit" name="register">Register</button>

      <div class="register-link">
        <p>Already have an account? <a href="login.php">Login here</a></p>
      </div>
    </form>
  </div>

  <!-- Particle.js container -->
  <div id="particles-js"></div>
  <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
  <script>
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