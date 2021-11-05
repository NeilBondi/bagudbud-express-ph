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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                        <li class="profile sidebar-item has-sub">
                            <a href="<?= base_url('/client-dashboard/profile') ?>" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Profile</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item edit-profile">
                                    <a href="<?= base_url('/client-dashboard/profile') ?>">My Profile</a>
                                </li>
                                <li class="submenu-item password-and-security">
                                    <a href="component-badge.html">Password and Security</a>
                                </li>
                                <li class="submenu-item delete-account">
                                    <a href="component-badge.html">Delete Account</a>
                                </li>
                                <li class="submenu-item">
                                    <a href="component-badge.html" class="text-danger">Logout</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dashboard sidebar-item">
                            <a href="<?= base_url('/client-dashboard/deliveries') ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Deliveries</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="component-alert.html">Success Requests</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-badge.html">Cancelled Requests</a>
                                </li>
                            </ul>
                        </li>
                        <li class="notifications sidebar-item">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-bell-fill"></i>
                                <span>Notifications</span>
                            </a>
                        </li>
                        <li class="tracking sidebar-item">
                            <a href="<?= base_url('/client-dashboard/tracking') ?>" class='sidebar-link'>
                                <i class="bi bi-map-fill"></i>
                                <span>Tracking</span>
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
                        <form method="post" class="" id="form">
                            <div class="d-inline-flex">
                                <h5 class="card-title position-relative title text-black">Add Request</h5>
                            </div>
                            <div class="row row-cols-1 row-cols-lg-2">

                                <!-- name -->

                                <div class="col">
                                    <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                        <label for="name" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Name</label>
                                        <input type="text" name="name" class="form-control form-control-sm py-2 fw-lighter" id="name" placeholder="Name">
                                    </div>
                                </div>

                                <!-- Phone number -->

                                <div class="col">
                                    <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                        <label for="phone-number" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Phone Number</label>
                                        <input type="number" name="phone-number" class="form-control form-control-sm py-2 fw-lighter" id="phone-number" placeholder="Phone Number">
                                        <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error message!</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-lg-2">

                                <!-- address -->

                                <div class="col">
                                    <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                        <label for="address" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Address</label>
                                        <input type="text" name="address" class="form-control form-control-sm py-2 fw-lighter" id="address" placeholder="Zone or Street / Barangay">
                                    </div>
                                </div>

                                <!-- Minicipality -->

                                <div class="col">
                                    <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                        <label for="Municipality" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Municipality</label>
                                        <input type="text" name="Municipality" class="form-control form-control-sm py-2 fw-lighter" id="Municipality" placeholder="Municipality">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-lg-2">

                                <!-- address -->

                                <div class="col">
                                    <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                        <label for="product-name" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Product Name</label>
                                        <input type="text" name="product-name" class="form-control form-control-sm py-2 fw-lighter" id="product-name" placeholder="Product Name">
                                    </div>
                                </div>

                                <!-- Minicipality -->

                                <div class="col">
                                    <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                        <label for="product-price" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Product Price</label>
                                        <input type="text" name="product-price" class="form-control form-control-sm py-2 fw-lighter" id="product-price" placeholder="Product Price">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                    <label for="product-name" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Delivery Mode of Payment</label>
                                    <select class="form-select form-select-sm py-2 fw-lighter" aria-label=".form-select-sm example" name="payment">
                                        <option selected value="COD">Cash On Delivery (COD)</option>
                                        <option value="COP">Cash on Pickup (COP)</option>
                                    </select>
                                    <span class="method-description display-8 mt-3 text-muted">Cash on Delivery provides lorem ipsum dolor sit amet consectetur adipisicing elit. Officia eveniet esse fugiat ex.</span>
                                    <span class="method-description display-8 mt-3 text-muted d-none">Cash on Pickup implements lorem ipsum dolor sit amet consectetur adipisicing elit. Officia eveniet esse fugiat ex.</span>
                                </div>
                            </div>
                            <div class="mt-5">
                                <button type="reset" class="btn cancel-btn btn-outline-primary text-secondary">Cancel</button>

                                <!-- Submit btn -->

                                <!-- <button type="submit" class="btn btn-primary">Add</button> -->
                                <input type="submit" class="btn btn-primary" value="Done">
                            </div>
                        </form>
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

                $(() => {
                    let getUrl = window.location;
                    let baseUrl = `${getUrl.origin}/${getUrl.pathname.split('/')[1]}`;
                    let currentUrl = getUrl.pathname.split('/')[3];
                    $('.items').each(function() {
                        $(this).click(function() {
                            // delivery details path
                            let id = $(this).attr('data-label').split('-')[1];
                            location.href = `${baseUrl}/client-dashboard/${currentUrl}/${id}`;
                        });
                    });

                    // implement active functionality in sidebaar
                    if (currentUrl === 'pending' || currentUrl === 'deliveries') {
                        $('.menu').children().not($('.dashboard')).each(function() {
                            $(this).removeClass('active')
                        })
                        $('.dashboard').addClass('active')
                    } else if (currentUrl === 'tracking') {
                        $('.menu').children().not($('.tracking')).each(function() {
                            $(this).removeClass('active')
                        })
                        $('.tracking').addClass('active')
                    } else if (currentUrl === 'profile') {
                        $('.menu').children().not($('.profile')).each(function() {
                            $(this).removeClass('active')
                        })
                        $('.profile, .edit-profile').addClass('active')
                        $('.profile').find('ul').addClass('active')
                    }

                    // end

                    $('.add-delivery').click(() => {
                        // redirect to add deliveries
                        // location.href = ${baseUrl}/client-dashboard/add-deliveries
                        $('.popup-container').addClass('popup-active');
                        $('body').addClass('popup-blur-active');
                    })
                    $('.pending-btn').click(() => {
                        // redirect to pending page
                        location.href = `${baseUrl}/client-dashboard/pending`;
                    })
                    $('.active-deliveries-btn').click(() => {
                        // redirect to deliveries page
                        location.href = `${baseUrl}/client-dashboard/deliveries`;
                    })

                    let requestID = null;
                    $('.cancel-btn').click(() =>  {
                        $('body').removeClass('popup-blur-active');
                        $('.popup-container').removeClass('popup-active');
                        requestID = null;
                    })
                    // console.log($('.add-delivery'))
                    // $('.modal').modal('show');

                    $('.method-description').prev('select').change(function() {
                        if ($(this).val() === 'COD') {
                            $('.method-description').first().removeClass('d-none');
                            $('.method-description').last().addClass('d-none');
                        } else {
                            $('.method-description').last().removeClass('d-none');
                            $('.method-description').first().addClass('d-none');
                        }
                    })

                    // Edit request
                    
                    $('.edit-request-btn').click(function() {
                        $('.popup-container').addClass('popup-active');
                        $('body').addClass('popup-blur-active');
                        requestID = {
                            requestID : getUrl.pathname.split('/')[4]
                        };

                        // console.log($('.popup-container').find('input'));

                        // let inputs = {};
                        // $('.popup-container').find('input').each(function() {
                        //     // inputs[this.name] = 'sample input'
                        //     $(this).val('l');
                        // });

                        const $parent = $('.popup-container');
                        
                        $.ajax({
                            url: "<?= base_url('ClientDashboard/temp'); ?>",
                            method: "GET",
                            dataType: "json",
                            data: requestID,
                            success: function (res) {
                                $parent.find('input[name=name]').val(res['name'])
                                $parent.find('input[name=phone-number]').val(res['p-num'])
                                $parent.find('input[name=address]').val(res['address'])
                                $parent.find('input[name=Municipality]').val(res['municipality'])
                                $parent.find('input[name=product-name]').val(res['product-name'])
                                $parent.find('input[name=product-price]').val(res['product-price'])
                                $parent.find('option[selected]').val()
                                if (res['payment'] == "COD") {
                                   $parent.find('option:first-child').attr('selected', 'true');
                                    $parent.find('option:last-child').removeAttr('selected');
                                    // console.log($parent.find('option:last-child'));
                                } else {
                                    $parent.find('option:last-child').attr('selected', 'true');
                                    $parent.find('option:first-child').removeAttr('selected');
                                }
                            }
                        });
                        
                    });

                    var bool_number = true;
                
                    $('#phone-number').keyup(function (e) {
                        var num = $(this).val(); 
                        var filter = /^(09)\d{9}$/;
                        
                        if(filter.test(num)){
                            // alert('ok');
                            $(this).next().text('').addClass('d-none');
                            bool_number = true;
                        }else{
                            // alert('no');
                            $(this).next().text('Invalid Number').removeClass('d-none');
                            bool_number = false;
                        }
                    });
                    $("input").attr("required", true);
                    $('#form').submit(function (e) { 
                        e.preventDefault();
                        if(bool_number && requestID === null){ // create new request
                            $.ajax({
                                type: "post",
                                url: "<?= base_url('ClientDashboard/addRecepient')?>",
                                data: new FormData(this),
                                contentType: false,
                                cache: false,
                                processData: false,
                                dataType: "json",
                                success: function (resData) {
                                    if(resData.code == 202){
                                        const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        timerProgressBar: false,
                                        didOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                        }
                                        })

                                        Toast.fire({
                                        icon: 'success',
                                        title: resData.msg
                                        }).then(function(){
                                            $('#form')[0].reset();
                                            $('body').removeClass('popup-blur-active');
                                            $('.popup-container').removeClass('popup-active');
                                            $('#userTable').load('#userTable');
                                        });

                                        
                                    }
                                    else if(resData.code == 404){

                                        Swal.fire(
                                        'Opps',
                                        resData.msg,
                                        'warning'
                                        ).then(function(){
                                            $('#form')[0].reset();
                                            $('body').removeClass('popup-blur-active');
                                            $('.popup-container').removeClass('popup-active');
                                        })
                                    }
                                }
                            });
                        } else if (bool_number && requestID !== null) { 
                            // edit request
                            var reqid = requestID.requestID;
                            var data = new FormData(this);
                            data.append('reqid', reqid);
                            
                            $.ajax({
                                type: "post",
                                url: "<?= base_url('ClientDashboard/editRecepient')?>",
                                data: data,
                                contentType: false,
                                cache: false,
                                processData: false,
                                dataType: "json",
                                success: function (resData) {
                                    if(resData.code == 202){
                                        const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        timerProgressBar: false,
                                        didOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                        }
                                        })

                                        Toast.fire({
                                        icon: 'success',
                                        title: resData.msg
                                        }).then(function(){
                                            $('#form')[0].reset();
                                            $('body').removeClass('popup-blur-active');
                                            $('.popup-container').removeClass('popup-active');
                                            window.location.reload();
                                        });

                                        
                                    }
                                    else if(resData.code == 404){

                                        Swal.fire(
                                        'Opps',
                                        resData.msg,
                                        'warning'
                                        ).then(function(){
                                            $('#form')[0].reset();
                                            $('body').removeClass('popup-blur-active');
                                            $('.popup-container').removeClass('popup-active');
                                        })
                                    }
                                }
                            });
                        } else{
                            Swal.fire(
                            'Something Wrong',
                            'Check your inputs!',
                            'warning'
                            )
                        }
                    });

                });

                
            </script>
           
</body>
</html>