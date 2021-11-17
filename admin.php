<?php
    session_start();

    //jika tidak ada session/session kosong, maka user akan di arahkan ke halaman login
    if (empty($_SESSION['username'])) {
        header("Location: ./");
    }

    //include koneksi database
    require_once "connect.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Halaman Dashboard</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <div id="login">
            <h3 class="text-center text-black pt-5">Halo, <?php echo $_SESSION['nama']; ?></h3>
            <div class="container">
                <div id="dashboard-profile" class="row justify-content-center align-items-center">
                    <div id="dashboard-profile-column" class="col-md-6">
                        <div id="profile-box" class="col-md-12 pt-5">
                            <p>Selamat datang di halaman profil anda.</p>
                            <br>
                            <a href="logout.php">
                                <button class="btn btn-info btn-md">Keluar</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
