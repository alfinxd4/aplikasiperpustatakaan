<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Rekayasatu </title>
    <!--Iconscout CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Custom styles for this page CSS -->
    <link href="<?php echo base_url(); ?>./assets/css/pages/login.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>./assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>./assets/images/logo/favicon.png" type="image/png">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>./assets/images/bg/library_bg.png" type="image/png">

</head>

<body>
    <div class="container">
        <div class="box-form">
            <div class="form login">
                <span class="title">Login Member</span>
                <!-- Form Input Login -->
                <form method="post" action="<?php echo base_url(); ?>Login/auth">
                    <div class="alert">
                        <!-- show function msg if usn / pass not found / wrong  -->
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                    <div class="input-field">
                        <input type="text" name="username" id="username" placeholder="Username / ID Anggota" autocomplete="off" required>
                        <i class="uil uil-user icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" id="password" class="password" placeholder="********" autocomplete="off" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Ingat Saya</label>
                        </div>
                        <a href="#" class="text">Lupa Password?</a>
                    </div>
                    <div class="input-field button">
                        <input type="submit" value="Login">
                    </div>
                </form>
                <div class="login-signup">
                    <span class="text">Belum punya akun?
                        <!-- connect to page register -->
                        <a href="<?php echo base_url(); ?>login" class="text signup-link">Daftar</a>
                    </span>
                </div>
            </div>
            <!-- Custom script for this page -->
            <script src="<?php echo base_url(); ?>./assets/js/customLogin.js"></script>
</body>

</html>