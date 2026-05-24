<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="InternLink is an internship tracking system that helps students manage applications, tasks, attendance, logbooks, and internship progress efficiently.">
    <meta name="keywords" content="Internship Tracker, Internship Management, Student Dashboard, Internship Applications">
    <meta name="author" content="Asma Aina Juraime">
    <!-- Internship application-->
    <title>InternLink | Internship Tracker Management System</title>
    <!--Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!--Bootstrap Icon CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!--Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <!--Custom CSS-->
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
<?php
    $error = "";

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        // Hardcoded username and password
        $correctUsername = "studentintern123";
        $correctPassword = "123456";

        // Check login
        if($username == $correctUsername && $password == $correctPassword){
            // Redirect to dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid username or password!";
        }
    }
?>

    <div class="container" >
        <!--LOGIN FORM-->
        <div class="form-box login">
            <form action="" method="POST">
                <h1>Login</h1>
                
                <?php if(!empty($error)) { ?>
                <div class="alert alert-danger py-2">
                    <?php echo $error; ?>
                </div>
                <?php } ?>

                <div class='input-box'>
                    <input type="text" name="username" placeholder="studentintern123" required>
                    <i class="bi bi-person-fill"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="123456" required>
                    <i class="bi bi-lock-fill"></i>
                </div>
                <div class="forgot-link">
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" name="login" class="btn">Login</button>
                <p>or login with</p>
                <div class="social-icons">
                    <a href="https://accounts.google.com/v3/signin/identifier?dsh=S1812573153:1655944654029516&flowEntry=ServiceLogin&flowName=WebLiteSignIn&ifkv=AX3vH39E0iYVTmn-NoMNM_C35EPrno8LWsRx2Qhr0HApkVLZ-Zc_Vql8ouaSQOiXzEmthrpOPAV5" class="google"><i class="bi bi-google"></i></a>
                    <a href="https://www.facebook.com/" class="faceboock" ><i class="bi bi-facebook"></i></a>
                    <a href="https://github.com/login" class="github"><i class="bi bi-github"></i></a>
                    <a href="https://www.linkedin.com/login/" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </form>
        </div>

        <!--REGISTER BOX-->
        <div class="form-box register">
            <form action="">
                <h1>Registration</h1>
                <div class='input-box'>
                    <input type="text" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class='input-box'>
                    <input type="email" placeholder="Email" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn">register</button>
                <p>or register with</p>
                <div class="social-icons">
                    <a href="https://accounts.google.com/v3/signin/identifier?dsh=S1812573153:1655944654029516&flowEntry=ServiceLogin&flowName=WebLiteSignIn&ifkv=AX3vH39E0iYVTmn-NoMNM_C35EPrno8LWsRx2Qhr0HApkVLZ-Zc_Vql8ouaSQOiXzEmthrpOPAV5" class="google"><i class="bi bi-google"></i></a>
                    <a href="https://www.facebook.com/" class="faceboock" ><i class="bi bi-facebook"></i></a>
                    <a href="https://github.com/login" class="github"><i class="bi bi-github"></i></a>
                    <a href="https://www.linkedin.com/login/" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </form>
        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <img src="img/logo.png" alt="LOGO">
                <br>
                <h1>Hello, Welcome!</h1>
                <p>Don't have an account?</p>
                <button class="btn register-btn">Register</button>
            </div>

            <div class="toggle-panel toggle-right">
                <img src="img/logo.png" alt="LOGO">
                <br>
                <h1>Welcome Back!</h1>
                <p>Already have an account?</p>
                <button class="btn login-btn">login</button>
            </div>

        </div>
    </div>

<!--Bootstarp JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<!--Custom JS-->
<script src="script.js"></script>
</body>
</html>