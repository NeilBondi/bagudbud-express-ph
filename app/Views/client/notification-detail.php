<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
<?= $this->extend('dashboardDeliveries/dashboardDeliveriesLayout.php') ?> 

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
<?= $this->section('content'); ?>

            <div class="page-heading">
                <h3 class="text-black">Notifications</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="text-black">All Notifications</h4>
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
                                                <span class="display-5 fw-bold text-primary">John Doe</span>
                                                <p>October 3, 2021 12:00 pm</p>
                                            </div>
                                            <div class="notif-body mt-5 px-sm-5 pb-5">
                                                <p>Your Package has been successfuly delivered to <b>John Doe</b> at <b>San Miguel, Nabua</b> by <b>John Doe</b> your Delivery Personnel.</p>
                                                <div class="notif-image-container">
                                                    <a href="<?= base_url('/public/assets/img/joyceeh-epino-backdrop_ka12.jpg') ?>">
                                                        <img src="<?= base_url('/public/assets/img/joyceeh-epino-backdrop_ka12.jpg') ?>" class="img-fluid" style="max-width: 15rem;" alt="">
                                                    </a>
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