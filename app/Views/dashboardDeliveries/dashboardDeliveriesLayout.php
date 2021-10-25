<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('/public/assets/dashboard/css/bootstrap.css')?>">

    <link rel="stylesheet" href="<?= base_url('/public/assets/dashboard/vendors/iconly/bold.css')?>">

    <link rel="stylesheet" href="<?= base_url('/public/assets/dashboard/vendors/bootstrap-icons/bootstrap-icons.css')?>">
    <link rel="stylesheet" href="<?= base_url('/public/assets/dashboard/css/app.css')?>">
    <link rel="stylesheet" href="<?= base_url('/public/assets/css/customs.min.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
</head>
<body class="position-relative">
    <div id="app" class="d-nones d-sm-block">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
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
                        <li class="sidebar-item">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item active">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Deliveries</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Notifications</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <?= $this->renderSection('content') ?>
            <div class="popup-container container-fluid position-fixed top-50 start-50 translate-middle justify-content-center row">
                <div class="col-11 col-md-9 col-lg-8 col-xl-6 col-xxl-5 p-4 card">
                    <div class="card-body">
                        <form action="" method="post" class="">
                            <div class="d-inline-flex">
                                <h5 class="card-title position-relative title text-black">Add Delivery</h5>
                            </div>
                            <div class="row row-cols-1 row-cols-lg-2">
                                <div class="col">
                                    <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                        <label for="name" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Name</label>
                                        <input type="text" name="name" class="form-control form-control-sm py-2 fw-lighter" id="name" placeholder="Name">
                                    </div>
                                </div>

                                <!-- Confirm Password -->

                                <div class="col">
                                    <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                        <label for="phone-number" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Phone Number</label>
                                        <input type="number" name="phone-number" class="form-control form-control-sm py-2 fw-lighter" id="phone-number" placeholder="Phone Number">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-lg-2">
                                <div class="col">
                                    <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                        <label for="address" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Address</label>
                                        <input type="text" name="address" class="form-control form-control-sm py-2 fw-lighter" id="address" placeholder="Address">
                                    </div>
                                </div>

                                <!-- Confirm Password -->

                                <div class="col">
                                    <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                        <label for="Municipality" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Municipality</label>
                                        <input type="text" name="Municipality" class="form-control form-control-sm py-2 fw-lighter" id="Municipality" placeholder="Municipality">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                    <label for="product-name" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Mode of Payment</label>
                                    <select class="form-select form-select-sm py-2 fw-lighter" aria-label=".form-select-sm example" name="product-name">
                                        <option selected>Cash On Delivery (COD)</option>
                                        <option value="GCash">GCash</option>
                                        <option value="PayMaya">PayMaya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-5">
                                <button type="reset" class="btn cancel-btn btn-outline-primary text-secondary">Cancel</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?= base_url('/public/assets/dashboard/js/pages/dashboard.js')?>"></script>

    <script src="<?= base_url('/public/assets/dashboard/js/main.js')?>"></script>
    <script src="<?= base_url('/public/assets/dashboard/js/bootstrap.min.js')?>"></script>
    
            <script>
                $(() => {
                    let getUrl = window.location;
                    let baseUrl = `${getUrl.origin}/${getUrl.pathname.split('/')[1]}`;
                    let currentUrl = getUrl.pathname.split('/')[3];
                    $('.items').each(function() {
                        $(this).click(function() {
                            // delivery details path
                            let id = $(this).find('#id').val();
                            location.href = `${baseUrl}/client-dashboard/${currentUrl}/${id}`
                        });
                    });

                    $('.add-delivery').click(() => {
                        // redirect to add deliveries
                        // location.href = `${baseUrl}/client-dashboard/add-deliveries`
                        $('.popup-container').addClass('popup-active');
                        $('body').addClass('popup-blur-active');
                    })
                    $('.pending-btn').click(() => {
                        // redirect to pending page
                        location.href = `${baseUrl}/client-dashboard/pending`
                    })
                    $('.active-deliveries-btn').click(() => {
                        // redirect to deliveries page
                        location.href = `${baseUrl}/client-dashboard/deliveries`
                    })
                    $('.cancel-btn').click(() =>  {
                        $('body').removeClass('popup-blur-active');
                        $('.popup-container').removeClass('popup-active');
                    })
                    // console.log($('.add-delivery'))
                    // $('.modal').modal('show');
                });
            </script>
           
</body>

</html>