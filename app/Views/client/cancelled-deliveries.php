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
                                <h4 class="text-black">Cancelled Requests</h4>
                            </div>
                            <div class="card-body">
                                <div class="px-0 px-sm-5 mx-md-3 mb-5 mt-3" style="max-width: 50rem; width: 100%">
                                        
                                    <table class="table table-hover table-container position-relative">
                                        
                                        <thead class="line-overlay">
                                            
                                        </thead>
                                        <tbody id="userTable pt-5" class="cancel">

                                            <!-- item start -->
                                            <!-- change the aria-label. change the number only based on the id in db ex. for the next item data-label="item-2" -->
                                           
                                        </tbody>
                                    </table>
                                </div>
                                   
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <script>
               $(document).ready(function () {  
                cancelDel();
                setInterval(() => {
                    cancelDel();
                }, 1000)
               });

               function cancelDel() {
                        $.ajax({
                            type: 'ajax',
                            url: "<?= base_url('ClientDashboard/displayCancel'); ?>",
                            async: true,
                            success: function (data) {
                            $('.cancel').html(data);
                            
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
                            }
                        })
                }
            </script>

<?= $this->endSection(); ?>