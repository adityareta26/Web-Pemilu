<?php
require_once "function/function.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #4b5320; /* Hijau army */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            text-align: left; /* Ubah text-align menjadi left */
        }
        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 1.5rem;
        }
        .logo-container img {
            width: 100px; /* Sesuaikan ukuran logo */
            margin: 0 15px; /* Jarak antar logo */
        }
        .login-container h2 {
            margin-bottom: 1rem;
            color: #333;
            text-align: center; /* H2 tetap di tengah */
        }
        .form-group {
            margin-bottom: 1rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }
        input[type="submit"] {
            width: 100%;
            padding: 0.5rem;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <?php
    if (isset($_SESSION['status'])) {
        if ($_SESSION['status'] == 'login') {
            header("Location: pemilu.php");
            exit();
        }
    }

    $errorMessage = "";
    if (isset($_POST['login'])) {
        $form = new User;

        if ($form->cek_nim($_POST['nim'])) {
            if ($form->login($_POST['password'], TRUE)) {
                if ($form->sudah_memilih()) {
                    $form->login($_POST['password']);
                }
            } else {
                $errorMessage = "Password salah";
            }
        } else {
            $errorMessage = "NIM tidak terdaftar";
        }
    }
    ?>

    <div class="login-container">
        <div class="logo-container">
            <img src="assets/gambar/LogoUINIB.png" alt="Logo 1">
            <img src="assets/gambar/LogoFST.PNG" alt="Logo 2">
            <img src="assets/gambar/sema.jpg" alt="Logo 3">
        </div>
        <h2>PEMILU RAYA DIGITAL FST 2024</h2>
        <?php if ($errorMessage): ?>
            <div class="error-message"><?php echo $errorMessage; ?></div>
        <?php endif; ?>
        <form method="POST" action="index.php">
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" name="nim" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>
