<?php

    //memulai session
    session_start();

    //jika ditemukan session, maka user akan otomatis dialihkan ke halaman admin
    if (isset($_SESSION['username'])) {
        header("Location: admin.php");
    }

    //include koneksi database
    require_once "connect.php";

    //jika tombol login ditekan, maka akan mengirimkan variabel yang berisi username dan password
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $userpass = $_POST['password']; //password yang di inputkan oleh user lewat form login

        //query ke database
        $sql = mysqli_query($connect_db, "SELECT username, password, nama FROM login WHERE username = '$username'");

        list($username, $password, $nama) = mysqli_fetch_array($sql);

        //jika data ditemukan dalam database, maka akan melakukan validasi dengan password_verify
        if (mysqli_num_rows($sql) > 0) {

            /*
            validasi login dengan password_verify
            $userpass -----> diambil dari password yang diinputkan user lewat form login
            $password -----> diambil dari password dalam database
            */
            if (password_verify($userpass, $password)) {

                //buat session baru
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['nama']     = $nama;

                //jika login berhasil, user akan diarahkan ke halaman admin
                header("Location: admin.php");
                die();
            } else {
                //Jika password tidak cocok, maka user akan diarahkan ke form login dan menampilkan pesan error
                echo '<script language="javascript">
                        window.alert("LOGIN GAGAL! Silakan coba lagi");
                        window.location.href="./";
                      </script>';
            }
        } else {
            //jika data tidak ditemukan dalam database, maka user akan diarahkan ke halaman error maka user akan diarahkan ke form login dan menampilkan pesan error
            echo '<script language="javascript">
                    window.alert("LOGIN GAGAL! Silakan coba lagi");
                    window.location.href="./";
                  </script>';
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Implementasi password_hash dan password_verify pada login aplikasi PHP</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <div id="login">
            <h3 class="text-center text-info pt-5">Selamat Datang</h3>
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form" action="" method="post">
                                <p class="text-center text-muted">Masuk ke akun Anda</p>
                                <div class="form-group">
                                    <label for="username" class="text-info">Username:</label><br>
                                    <input type="text" name="username" id="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="text-info">Password:</label><br>
                                    <input type="text" name="password" id="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="login" class="btn btn-info btn-md">Masuk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
