<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>NMU | Login Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="assets_login/img/favicon.ico"/>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_login/src/normalize.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets_login/dist/style.css">
  <script src="<?php echo base_url(); ?>assets_login/src/prefixfree.min.js"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container" onclick="onclick">
  <div class="top"></div>
  <div class="bottom"></div>
    <form action="<?php echo base_url("clogin/process") ?>" method="post">
        <div class="center">
            <img src="<?php echo base_url(); ?>assets_login/img/logo.png" width="200px">
            <h2>Login SIGMA </h2>
            <input type="username" name="username" placeholder="username">
            <input type="password" name="password"  placeholder="password">
            &nbsp;
            <button type="submit" name="submit" style="font-family: inherit; background-color: #1cc88a; color: white; padding: 7px 40px; border-radius: 5px;"><strong>LOGIN</strong></button>
            <a class="txt2" href="<?= base_url('assets/media/books/ManualBookDashboardNMU_PDF_2023-05-09154003.622098.pdf')?>" target="_blank">
              <h5>Download User Manual Book di sini</h5>
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
        </div>
    </form>
</div>
<!-- partial -->
  <script src='https://codepen.io/banik/pen/ReNNrO/3f837b2f0085b5125112fc455941ea94.js'></script>
</body>
</html>
