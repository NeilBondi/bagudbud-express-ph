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
                                <h4 class="text-black">Success Requests</h4>
                            </div>
                            <div class="card-body">
                                <div class="px-0 px-sm-5 mx-md-3 mb-5 mt-3" style="max-width: 50rem; width: 100%">
                                        
                                    <table class="table table-hover table-container position-relative">
                                        
                                        <thead class="line-overlay">
                                            
                                        </thead>
                                        <tbody id="userTable pt-5">

                                            <!-- item start -->
                                            <!-- change the aria-label. change the number only based on the id in db ex. for the next item data-label="item-2" -->
                                            <tr class="items" data-label="item-1" style="cursor: pointer;">
                                                <td>
                                                    <div class="d-flex align-items-center py-1 py-xxl-3">
                                                            <div class="request-item-content w-100 ms-4">
                                                                <div class="left-content">

                                                                    <!-- Delivery man or Recipient -->

                                                                    <p class="text-black fw-bold m-0">John Doe</p>

                                                                    <!-- Recipient Address -->

                                                                    <span class="display-7">San Miguel, Nabua</span>
                                                                </div>

                                                                    <!-- Date cancelled -->

                                                                <div class="right-content">
                                                                    <span class="display-7">7:01 am</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr> 
                                        </tbody>
                                    </table>
                                </div>
                                   
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <script>
                $(() => {
                    
                })
            </script>

<?= $this->endSection(); ?>