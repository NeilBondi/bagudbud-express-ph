<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
<?= $this->extend('rider/dashboardDeliveriesLayout.php') ?> 

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
<?= $this->section('content'); ?>
            <div class="page-heading">
                <h3 class="text-black">Dashboard</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card p-4">
                            <div class="card-header">
                                <h4 class="text-black">Request Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="section-headers row">
                                    <div class="col-8 mb-4">
                                        <button class="btn back-btn d-inline-flex align-items-center p-0">
                                            <i class="bi bi-arrow-left"></i>
                                            <span class="font-semibold ms-2">Back</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="details-content row px-sm-4 px-sm-5 mx-md-3 mb-sm-5 mt-4" style="max-width: 60rem; width: 100%">
                                    <div class="col">
                                        <div class="row row-cols-1 row-cols-sm-2" style="min-height: 8rem;">
                                            <div class="col">
                                                <div class="pickup-point d-flex">
                                                    <div class="con">
                                                        <p class="fw-semibold mb-2">Pickup point</p>

                                                        <!-- pickiup point ZONE STREET AND BARANGAY CITY -->

                                                        <p class="display-6 m-0 fw-bold text-black">001, Zone 4</p>
                                                        <p class="display-6 m-0 fw-bold text-black">San Miguel, Nabua</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mt-5 mt-sm-0">
                                                <div class="delivery-point d-flex">
                                                    <div class="con">
                                                        <p class="fw-semibold mb-2">Delivery point</p>

                                                        <!-- delivery point ZONE STREET AND BARANGAY CITY -->

                                                        <p class="display-6 m-0 fw-bold text-black">001, Zone 4</p>
                                                        <p class="display-6 m-0 fw-bold text-black">San Miguel, Nabua</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-sm-2" style="min-height: 8rem;">
                                            <div class="col mt-5 mt-sm-0">
                                                <div class="">
                                                    <p class="fw-semibold mb-2">Mode of Payment</p>

                                                    <!-- Mode of payment -->

                                                    <p class="display-6 m-0 fw-bold text-black">Cash on Delivery (COD)</p>
                                                </div>
                                            </div>
                                            <div class="col mt-5 mt-sm-0">
                                                <div class="">
                                                    <p class="fw-semibold mb-2">Product Type</p>

                                                    <!-- product type -->

                                                    <p class="display-6 m-0 fw-bold text-black">Garments</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mt-5 mt-sm-0">
                                                <div class="btns d-flex flex-column flex-sm-row">
                                                    <button class="btn btn-primary border-2 py-2 px-5 border-primary fw-bold">Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
                });
                $(() => {

                    
                    // });
                    let getUrl = window.location;
                    let baseUrl = `${getUrl.origin}/${getUrl.pathname.split('/')[1]}`;
                    let currentUrl = getUrl.pathname.split('/')[3];

                    $('.back-btn').click(() => {
                        location.href = `${baseUrl}/rider-dashboard/${currentUrl}`;
                    })
                });
            </script>
<?= $this->endSection(); ?>