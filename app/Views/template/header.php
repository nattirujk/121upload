<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ครบรอบ ๑๒๑ ปี กรมชลประทาน</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="<?php echo site_url('/favicon.ico') ?>" />

    <!-- custom css -->
    <script src="<?=base_url('/assets/js/jquery-3.7.0.min.js')?>" ></script>
    <link href="<?=base_url('/assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('/assets/css/sweetalert2.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('/assets/css/select2.min.css')?>" rel="stylesheet">

</head>
<style>
    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        overflow-x: hidden;
        background-color: #e3f5fc;
        /* background-image: url('<?= site_url('/assets/img/121RID.png') ?>'); */
    }

    nav {
        background-color: #e3f5fc;
    }

    footer {
        margin-top: auto;
    }
</style>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light p-0 text-end">
            <div class="container-fluid">
                <a class="navbar-brand text-start m-0 p-1" href="https://www.rid.go.th/">
                    <img src="<?php echo site_url('/assets/img/logo/rid_logo.png') ?>" height="70px" alt="logo">
                </a>
             
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2">
                            <li class="nav-item ">
                                <a class="nav-link " href="<?php echo url_to('index')?>">หน้าแรก</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#">คู่มือ</a>
                            </li>
                            <li class="nav-item">
                            <?php if (!session()->get('username')) : ?>
                            <a class="nav-link" href="<?php echo url_to('login') ?>">เข้าสู่ระบบ</a>
                            <?php else :?> 
                                <a class="nav-link active" href="<?php echo url_to('logout') ?>">ออกจากระบบ</a>
                            <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                
            </div>
       
        </nav>

        <img src="<?php echo site_url('/assets/img/banner/bg-rid121.png') ?>" style="width: 100%" alt="banner">
        <br>
    </header>
    <br>