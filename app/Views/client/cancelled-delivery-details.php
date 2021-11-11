<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
<?= $this->extend('dashboardDeliveries/dashboardDeliveriesLayout.php') ?> 

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
<?= $this->section('content'); ?>

            <div class="page-heading">
                <h3 class="text-black">Deliveries</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="text-black">Cancelled Deliveries</h4>
                            </div>
                            <div class="card-body">
                                <div class="section-headers row">
                                    <div class="col-8 mb-4">
                                        <button class="btn back-btn d-inline-flex align-items-center p-0">
                                            <i class="fas fa-arrow-left"></i>
                                            <span class="font-semibold ms-2">Back</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-11">
                                        <div class="details-container">
                                            <div class="notif-header  border-bottom border-secondary mt-3 pb-2">
                                                <div class="request-item-content w-100 mx-4 pe-5">
                                                    <div class="left-content">

                                                        <!-- Delivery man or Recipient -->

                                                        <p class="display-5 text-primary fw-bold m-0">John Doe</p>

                                                        <!-- Recipient Address -->

                                                        <span class="display-7">San Miguel, Nabua</span>
                                                    </div>

                                                        <!-- Date cancelled -->

                                                    <div class="right-content">
                                                        <span class="display-7">7:01 am</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notif-body mt-5 px-sm-5 pb-5">
                                                <p style="text-indent:2rem">Your Package has been cancelled by <b>John Doe</b> your Delivery Man. Your package was originally sent to <b>John Doe</b> at <b>San Miguel, Nabua</b> but it was cancelled due to unresponsive recipient.</p>
                                                <p>Your package will be returned on your address within a few hours.</p>
                                                <p>Thank you</p>
                                                <p class="pt-5">Kindly click the button below to contact the customer support to address your concerns.</p>
                                                <a href="#" class="btn btn-primary">Customer Support</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <script>
                $(() => {
                    let getUrl = window.location;
                    let baseUrl = `${getUrl.origin}/${getUrl.pathname.split('/')[1]}`;
                    let currentUrl = getUrl.pathname.split('/')[3];
                    $('.back-btn').click(() => {
                        location.href = `${baseUrl}/client-dashboard/${currentUrl}`;
                    })
                })
            </script>

<?= $this->endSection(); ?>