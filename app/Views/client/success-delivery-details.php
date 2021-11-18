<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
<?= $this->extend('dashboardDeliveries/dashboardDeliveriesLayout.php') ?> 

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
<?= $this->section('content'); 

foreach ($request as $row){
    $date = date_create($row['cancelsuccess_date']);
    $xdate = date_format($date, "F j, Y, g:i a"); 
?>

            <div class="page-heading">
                <h3 class="text-black">Deliveries</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="text-black">Success Deliveries</h4>
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

                                                        <p class="display-5 text-primary fw-bold m-0"><?= $row['recepient_name'];?></p>

                                                        <!-- Recipient Address -->

                                                        <span class="display-7"><?php echo $row['recepient_address'];?>, <?php echo $row['recepient_municipality'];?></span>
                                                    </div>

                                                        <!-- Date cancelled -->

                                                    <div class="right-content">
                                                        <span class="display-7"><?php echo $xdate; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notif-body mt-5 px-sm-5 pb-5">
                                                <p style="text-indent:2rem">Your Package has been successfuly delivered to <b><?= $row['recepient_name'];?></b> at <b><?php echo $row['recepient_address'];?>, <?php echo $row['recepient_municipality'];?></b> by <b><?= $row['delP_fName'].' '.$row['delP_lName'];?></b> your Delivery Man.</p>
                                                <span>Image As Proof of Successful delivery:</span>
                                                <div class="notif-image-container">
                                                    <a href="<?= base_url('/public/proofImages/'.$row['image'].'') ?>">
                                                        <img src="<?= base_url('/public/proofImages/'.$row['image'].'') ?>" class="img-fluid" style="max-width: 15rem;" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end me-sm-5">
                                        <form action="" method="POST" class="me-sm-5">
                                            <button class="btn btn-danger px-4 mb-5 mx-sm-5" type="submit">Delete</button>
                                        </form>
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

<?= $this->endSection(); 
    }
?>