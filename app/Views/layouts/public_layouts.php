<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>121 year</title>

    <!-- Bootstrap core CSS -->
    <link href=" <?=base_url('/assets/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Styles -->

    <link href="<?=base_url('/assets/css/select2.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('/assets/css/select2-bootstrap-5-theme.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('/assets/css/select2-bootstrap-5-theme.rtl.min.css')?>" rel="stylesheet">
    
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;300&display=swap" rel="stylesheet">

   <!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <link href="<?=base_url('/assets/css/carousel.css')?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    
    <style>
        body {
            font-family: 'Kanit', sans-serif;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        #return-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: rgb(0, 0, 0);
            background: rgba(0, 0, 0, 0.7);
            width: 50px;
            height: 50px;
            display: block;
            text-decoration: none;
            -webkit-border-radius: 35px;
            -moz-border-radius: 35px;
            border-radius: 35px;
            display: none;
            -webkit-transition: all 0.3s linear;
            -moz-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        #return-to-top i {
            color: #fff;
            margin: 0;
            position: relative;
            left: 16px;
            top: 13px;
            font-size: 19px;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        #return-to-top:hover {
            background: rgba(0, 0, 0, 0.9);
        }

        #return-to-top:hover i {
            color: #fff;
            top: 5px;
        }
    </style>
 <?= $this->renderSection('css') ?>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md fixed-top bg-rid navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="<?=base_url('/assets/rid_logo.png')?>" alt="" height="70px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <h4>120 ปี สู่อนาคต สู่ทศวรรษใหม่ 13 มิถุนายน 2566</h4>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo url_to('index')?>">หน้าแรก</a>
                    </li>
                    <?php if (session()->get('username')) : ?>
                        <a class="nav-link" href="<?php echo url_to('uploader') ?>">เพิ่มภาพกิจกรรม</a>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">คู่มือ</a>
                    </li>
                    <li class="nav-item">
                    <?php if (!session()->get('username')) : ?>
                        <a class="nav-link" href="<?php echo url_to('register') ?>">ลงทะเบียน</a>
                        <?php endif; ?>
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
    </header>

    <main>
        <article>
            <?= $this->renderSection('content') ?>
        </article>
    </main>

    <!-- FOOTER -->
    <footer class="container">
        <!-- Return to Top -->
        <a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
        <p class="float-end"><a class="text-info" href="https://infgis.rid.go.th/">พัฒนาโดย ส่วนระบบสารสนเทศและภูมิสารสนเทศ ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร</a></p>
        <p><span>สงวนลิขสิทธิ์ &copy; <?= date('Y') + 543 ?> กรมชลประทาน</span></p>
    </footer>

    <!-- Scripts -->
    <script src="<?=base_url('/assets/js/jquery-3.7.0.min.js')?>" ></script>
    <script src="<?=base_url('/assets/js/bootstrap.bundle.min.js')?>" ></script>
    <script src="<?=base_url('/assets/js/select2.full.min.js')?>" ></script>


    <script>
        // ===== Scroll to Top ====
        $(window).scroll(function() {
            if ($(this).scrollTop() >= 50) { // If page is scrolled more than 50px
                $('#return-to-top').fadeIn(200); // Fade in the arrow
            } else {
                $('#return-to-top').fadeOut(200); // Else fade out the arrow
            }
        });
        $('#return-to-top').click(function() { // When arrow is clicked
            $('body,html').animate({
                scrollTop: 0 // Scroll to top of body
            }, 500);
        });
    </script>
<?= $this->renderSection('javascript') ?>
</body>

</html>
