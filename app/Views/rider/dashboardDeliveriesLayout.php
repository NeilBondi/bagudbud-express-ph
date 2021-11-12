<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="<?= base_url() ?>/public/assets/img/iconBagudbud.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('/public/assets/dashboard/css/bootstrap.css')?>">
    <link rel="shortcut icon" href="<?= base_url() ?>/public/assets/img/iconBagudbud.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url('/public/assets/dashboard/vendors/iconly/bold.css')?>">

    <link rel="stylesheet" href="<?= base_url('/public/assets/dashboard/vendors/bootstrap-icons/bootstrap-icons.css')?>">
    <link rel="stylesheet" href="<?= base_url('/public/assets/dashboard/css/app.css')?>">
    <link rel="stylesheet" href="<?= base_url('/public/assets/css/customs.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('/public/assets/css/app.css')?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="position-relative">
    <div id="app" class="d-nones d-sm-block">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active position-fixed">
                <div class="sidebar-header">
                    <div class="">
                        <div class="logo d-flex">
                            <a href="index.html" class="w-100"><img src="<?= base_url('/public/assets/img/Artboard 12@72x-8.png')?>" alt="Logo" srcset="" class="h-50"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <li class="profile sidebar-item has-sub">
                            <a href="<?= base_url('/rider-dashboard/profile') ?>" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Profile</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item edit-profile">
                                    <a href="<?= base_url('/rider-dashboard/profile') ?>">My Profile</a>
                                </li>
                                <li class="submenu-item password-and-security">
                                    <a href="<?= base_url('/rider-dashboard/password-and-security') ?>">Password and Security</a>
                                </li>
                                <li class="submenu-item delete-account">
                                    <a href="<?= base_url('/rider-dashboard/delete-account') ?>" id="delete-account">Delete Account</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="<?= base_url('riderLogin/logout');?>" class="text-danger">Logout</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dashboard sidebar-item">
                            <a href="<?= base_url('/rider-dashboard/requests') ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="deliveries sidebar-item">
                            <a href="<?= base_url('/rider-dashboard/deliveries') ?>" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Deliveries</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3 d-flex justify-content-between align-items-center">
                <a href="#" class="burger-btn d-inline-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
                <a href="" class="btn d-block d-sm-none">
                    <div class="avatar avatar-sm">
                        <img src="<?= base_url('/public/assets/dashboard/images/faces/1.jpg')?>" alt="Face 1">
                    </div>
                    <span class="mx-2">John Doe</span>
                    <img src="<?= base_url('/public/assets/img/arrow-down.svg')?>" alt="">
                </a>
            </header>
            <div class="popup-container container-fluid position-absolute top-50 start-50 translate-middle justify-content-center row">
                <div class="col-11 col-md-9 col-lg-8 col-xl-6 col-xxl-5 p-4 card">
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
            <?= $this->renderSection('content') ?>
            

        </div>
    </div>
    <script src="<?= base_url('/public/assets/dashboard/js/pages/dashboard.js')?>"></script>
    <script src="<?= base_url('/public/assets/dashboard/js/main.js')?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url('/public/assets/dashboard/js/bootstrap.min.js')?>"></script>
    
    <script type="text/javascript">
                $(document).ready(function () {
                    reloadTable();
                });
                $(() => {
                   
                    let getUrl = window.location;
                    let baseUrl = `${getUrl.origin}/${getUrl.pathname.split('/')[1]}`;
                    let currentUrl = getUrl.pathname.split('/')[3];
                    $('.items').each(function() {
                        $(this).click(function() {
                            // delivery details path
                            let id = $(this).attr('data-label').split('-')[1];
                            location.href = `${baseUrl}/rider-dashboard/${currentUrl}/${id}`;
                        });
                    });

                    // implement active functionality in sidebaar
                    if (currentUrl === 'requests') {
                        $('.menu').children().not($('.dashboard')).each(function() {
                            $(this).removeClass('active')
                        })
                        $('.dashboard').addClass('active')
                    } else if (currentUrl === 'deliveries') {
                        $('.menu').children().not($('.deliveries')).each(function() {
                            $(this).removeClass('active')
                        })
                        $('.deliveries').addClass('active')
                    } else if (currentUrl === 'profile') {
                        $('.menu').children().not($('.profile')).each(function() {
                            $(this).removeClass('active')
                        })
                        $('.profile, .edit-profile').addClass('active')
                        $('.profile').find('ul').addClass('active')
                    }else if (currentUrl === 'password-and-security') {
                        $('.menu').children().not($('.password-and-security')).each(function() {
                            $(this).removeClass('active')
                        })
                        $('.profile, .password-and-security').addClass('active')
                        $('.profile').find('ul').addClass('active')
                    } else if (currentUrl === 'delete-account') {
                        $('.menu').children().not($('.delete-account')).each(function() {
                            $(this).removeClass('active')
                        })
                        $('.profile, .delete-account').addClass('active')
                        $('.profile').find('ul').addClass('active')
                    } 

                    // end
                });

                function reloadTable() {
                    $.ajax({
                        type: 'ajax',
                        url: "<?= base_url('RiderDashboard/displayAllRequest'); ?>",
                        async: true,
                        success: function (data) {
                        $('.userTable').html(data);
                        reloadTable();
                        let getUrl = window.location;
                            let baseUrl = `${getUrl.origin}/${getUrl.pathname.split('/')[1]}`;
                            let currentUrl = getUrl.pathname.split('/')[3];
                            $('.items').each(function() {
                                $(this).click(function() {
                                    // delivery details path
                                    let id = $(this).attr('data-label').split('-')[1];
                                    location.href = `${baseUrl}/rider-dashboard/${currentUrl}/${id}`;
                                });
                            });
                        }
                    })
                    }

                
            </script>
           
</body>
</html>