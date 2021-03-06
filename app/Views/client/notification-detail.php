<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
<?= $this->extend('dashboardDeliveries/dashboardDeliveriesLayout.php') ?> 

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
<?= $this->section('content'); 
    foreach($result as $row){

        $date = date_create($row['ndate']);
        $xdate = date_format($date, "F j, Y, g:i a");
?>

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
                                                <span class="display-5 fw-bold text-primary"><?php echo $row['sender'];?></span>
                                                <p><?php echo $xdate?></p>
                                            </div>
                                            <div class="notif-body mt-5 px-sm-5 pb-5">
                                                <p><?php echo $row['body'];?></p>
                                                <p>Tracking Number: <span><?php echo $row['tracking'];?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end me-sm-5">
                                        <form action="" method="POST" class="me-sm-5" id="notif-delete">
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

                    $('#notif-delete').submit(function (e) { 
                        e.preventDefault();
                       var notif_id = <?= $row['notif_id'];?>;
                        
                       $.ajax({
                           type: "post",
                           url: "<?= base_url('ClientProfile/deleteNotif')?>",
                           data: {
                               notif_id: notif_id
                           },
                           dataType: "json",
                           success: function (res) {
                               if(res.code == 202){
                                    location.href= "<?= base_url('client-dashboard/notifications')?>";
                               }
                           }
                       });
                    });
                })
            </script>

<?= $this->endSection(); 

    }
?>