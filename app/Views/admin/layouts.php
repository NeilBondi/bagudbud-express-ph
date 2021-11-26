<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Administrator Panel</title>
        <link rel="shortcut icon" href="<?= base_url() ?>/public/assets/img/iconBagudbud.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="<?= base_url('/public/assets/dashboard/css/app.css') ?>" rel="stylesheet" />
        <link href="<?= base_url('/public/assets/admin/css/styles.css') ?>" rel="stylesheet" />
        <link href="<?= base_url('/public/assets/admin/css/app.css') ?>" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Administrator Panel</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 ms-4 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <div class="w-100 d-flex justify-content-end">
                <ul class="navbar-nav me-lg-5">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="<?= base_url('Admin/logout');?>">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?= base_url('/admin') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link" href="<?= base_url('/admin/client') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Clients
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Delivery Personnels
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?= base_url('/admin/applications') ?>">Applications</a>
                                    <a class="nav-link" href="<?= base_url('/admin/delivery-personnels') ?>">Active Delivery Personnels</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <?= $this->renderSection('content') ?>
            
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('/public/assets/admin/js/scripts.js') ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="<?= base_url('/public/assets/admin/js/datatables-simple-demo.js') ?>"></script>
        <script>
            $(() => {
                $('.delete-item').click(function() {

                    $('.cancel-container').addClass('popup-active');
                    $('body').addClass('popup-blur-active');
                })

                $('#delete-form').submit(function(event) {
                    event.preventDefault()

                    $('.cancel-container').removeClass('popup-active');
                    $('body').removeClass('popup-blur-active');
                })
                $('.message-item').click(function() {

                    $('.message-container').addClass('popup-active');
                    $('body').addClass('popup-blur-active');
                })

                $('#notify-form').submit(function(event) {
                    event.preventDefault()

                    $('.message-container').removeClass('popup-active');
                    $('body').removeClass('popup-blur-active');
                })

                $(document).click((e) => {
                    if (e.target.tagName === 'BODY' || e.target.classList.contains('popup-active')) {
                        $('.popup-active').removeClass('popup-active');
                        $('body').removeClass('popup-blur-active');
                    }
                })
            })
        </script>
    </body>
</html>