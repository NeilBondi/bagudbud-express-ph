<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
<?= $this->extend('dashboardDeliveries/dashboardDeliveriesLayout.php') ?> 

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
<?= $this->section('content'); ?>

            <div class="page-heading">
                <h3 class="text-black">Dashboard</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row d-flex justify-content-center">
                            <div class="col-12 col-md-4">
                                <div class="card card-button add-delivery">
                                    <div class="card-body px-4 px-md-3 py-4">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon bg-primary">
                                                    <img src="<?= base_url('/public/assets/img/add-circle.svg'); ?>" class="w-50" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="font-bold text-black">Add Delivery</h6>
                                                <!-- <h6 class="font-extrabold mb-0">112.000</h6> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="card card-button pending-btn">
                                    <div class="card-body px-4 px-md-3 py-4">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <img src="<?= base_url('/public/assets/img/time-square 1.svg'); ?>" class="w-50" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Pending</h6>

                                                <!-- Insert Pending Count -->

                                                <h5 class="font-extrabold mb-0 text-black">1</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="card card-button active-deliveries-btn">
                                    <div class="card-body px-4 px-md-3 py-4">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <img src="<?= base_url('/public/assets/img/package(1).svg'); ?>" class="w-50" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Active Deliveries</h6>

                                                <!-- Insert Active Deliveries Count -->

                                                <h5 class="font-extrabold mb-0 text-black">2</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card p-4">
                                    <div class="card-header">
                                        <h4 class="text-black">Profile Visit</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="section-headers row">
                                            <div class="col-8">
                                                <button class="btn back-btn d-inline-flex align-items-center p-0">
                                                    <i class="fas fa-arrow-left"></i>
                                                    <span class="font-semibold ms-2">Back</span>
                                                </button>
                                            </div>
                                            <div class="col d-flex flex-column">
                                                <span>
                                                    Track ID: 
                                                    <!-- Insert track ID here -->
                                                    <span class="track-id">123456789</span>
                                                </span>
                                                <span class="mt-2">
                                                    Status
                                                    <!-- Insert Status here -->
                                                    <span class="status">Active</span>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="track">
                                            <ul class="track-container">
                                                <li class="">
                                                    <span>
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#dbdada" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-minus">
                                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                                <polyline points="14 2 14 8 20 8"></polyline>
                                                                <line x1="9" y1="15" x2="15" y2="15"></line>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                    <span class="text-center">Delivery Request</span>
                                                </li>
                                                <li class="">
                                                    <span>
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#dbdada" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check">
                                                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                                <circle cx="8.5" cy="7" r="4"></circle>
                                                                <polyline points="17 11 19 13 23 9"></polyline>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                    <span class="text-center">Accepted Request</span>
                                                </li>
                                                <li class="">
                                                    <span>
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#dbdada" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck">
                                                                <rect x="1" y="3" width="15" height="13"></rect>
                                                                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                                                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                                                <circle cx="18.5" cy="18.5" r="2.5"></circle>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                    <span class="text-center">Shipped Out</span>
                                                </li>
                                                <li>
                                                    <span class="last">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#dbdada" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle">
                                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                            </svg>
                                                        </span>
                                                    </span>
                                                    <span class="text-center">Package Delivered</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bottom border-top mx-2 mx-md-5 row">
                                        <div class="people-details col-12 col-sm-5 border-end order-2 order-sm-1 my-5">
                                            <div class="recipient">
                                                <h5 class="text-black">Recipient</h5>

                                                <!-- change delivery contact details here -->

                                                <div class="ms-3 mt-3">
                                                    <p class="font-extrabold text-black mb-1">John Doe</p>
                                                    <p class="m-0">09123456789</p>
                                                    <p class="m-0">001, Zone 4, San Miguel</p>
                                                    <p class="m-0">Nabua</p>
                                                </div>
                                            </div>
                                            <div class="delivery-man mt-5">
                                                <h5 class="text-black">Delivery Man:</h5>
                                                <div class="ms-3 mt-3">
                                                    <p class="font-extrabold text-black mb-1">John Doe</p>
                                                    <p class="m-0">09123456789</p>
                                                    <a href="" class="a-link2 position-relative text-decoration-none text-black fw-bold">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col px-xxl-5 order-1 order-sm-2 mt-5">
                                            <ul class="tracking-updates">

                                                <!-- change delivery updates here -->

                                                <li class="d-flex py-2">
                                                    <span>11/10/2021 7:02pm</span>
                                                    <span>Posted Delivery Request</span>
                                                </li>
                                                <li class="d-flex py-2">
                                                    <span>11/10/2021 7:02pm</span>
                                                    <span>Delivery man accepted the request</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="<?=base_url('/public/assets/dashboard/images/faces/1.jpg')?>">
                                    </div>
                                    <div class="ms-3 name">

                                        <!-- change seller -->

                                        <h5 class="font-bold text-black">John Doe</h5>
                                        <h6 class="text-muted mb-0">example@example.com</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-black">Details</h4>
                            </div>
                            <div class="card-content pb-4">
                                <div class="border-bottom mx-4">
                                    <div class="d-flex py-3 px-3 package-details-items">
                                        <span>Package type</span>

                                        <!-- change package type -->

                                        <span class="font-extrabold text-black text-end">Garments</span>
                                    </div>
                                </div>
                                <div class="border-bottom mx-4">
                                    <div class="d-flex py-3 px-3 package-details-items">
                                        <span>Package price</span>

                                        <!-- change package price -->

                                        <span class="font-extrabold text-black text-end">Php 500.00</span>
                                    </div>
                                </div>
                                <div class="border-bottom mx-4">
                                    <div class="d-flex py-3 px-3 package-details-items">
                                        <span>Delivery fee</span>

                                        <!-- change delivery fee -->

                                        <span class="font-extrabold text-black text-end">Php 50.00</span>
                                    </div>
                                </div>
                                <div class="px-4 mt-4">
                                    <button class='btn btn-block btn-xl btn-danger font-bold mt-3'>
                                        Cancel Delivery
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script>
                $(() => {
                    // $('.track-container').find('.active').find('svg').attr('stroke', '#fff')
                    // $('.track-container').find('.active').prevAll().each(function() {
                    //     $(this).find('svg').attr('stroke', '#1ec360');
                    // });
                    let getUrl = window.location;
                    let baseUrl = `${getUrl.origin}/${getUrl.pathname.split('/')[1]}`;
                    let currentUrl = getUrl.pathname.split('/')[3];

                    $('.back-btn').click(() => {
                        location.href = `${baseUrl}/client-dashboard/${currentUrl}`;
                    })
                    


                    /* change the value of delivery status based on the status in db */

                    let deliveryStatus = 'Accepted Request';
                    let status = {
                        0: 'delivery request',
                        1: 'accepted request',
                        2: 'shipped out',
                        3: 'package delivered'
                    };
                    for (const key in status) {
                        if (status[key].toLowerCase() === deliveryStatus.toLowerCase()) {
                            $('.track-container').children().eq(key).prevAll().each(function() {
                                $(this).addClass('recent-active')
                                $(this).find('svg').attr('stroke', '#1ec360');
                            });
                            $('.track-container').children().eq(key).addClass('active');
                            $('.track-container').children().eq(key).find('svg').attr('stroke', '#fff');
                        }
                    }
                })
            </script>

<?= $this->endSection(); ?>