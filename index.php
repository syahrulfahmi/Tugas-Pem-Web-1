<?php
//inisialisasi session
session_start();
//mengecek username pada session
if(!isset($_SESSION['username']) ){
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        .vertical-center {
            margin: 0;
            width: 100%;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="vertical-center">
        <?php  if (isset($_SESSION['username'])) : ?>
        <h2>
            Welcome
            <strong>
                <?php echo $_SESSION['username']; ?>
            </strong>
        </h2>
        <p>
            <a href="logout.php">
                Klik disini untuk logout
            </a>
        </p>
        <?php endif ?>
        </div>
</body>

</html>