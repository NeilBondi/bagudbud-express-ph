<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
<?= $this->extend('rider/dashboardDeliveriesLayout.php') ?> 

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
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header  d-flex justify-content-between">
                                        <h4 class="text-black">Accepted Deliveries</h4>
                                    </div>
                                    <div class="px-4 px-sm-5 mx-md-3 mb-5 mt-3" style="max-width: 50rem; width: 100%">
                                        
                                        <table class="table table-hover table-container position-relative">
                                            
                                            <thead class="line-overlay">
                                                
                                            </thead>
                                            <tbody id="userTable pt-5">

                                                <!-- item start -->
                                                <!-- change the aria-label. change the number only based on the id in db ex. for the next item data-label="item-2" -->
                                               
                                                <tr class="items" data-label="item-1" style="cursor: pointer;">
                                                    <td>
                                                        <div class="d-flex align-items-center py-1 py-xxl-3">
                                                            <div class="location-icon bg-primary">
                                                                <i class="bi bi-geo-alt-fill display-5"></i>
                                                            </div>
                                                            <div class="request-item-content w-100 ms-4">
                                                                <div class="left-content">
                                                                    <span class="display-7">Pickup Point</span>
                                                                    <p class="text-black fw-bold">San Miguel, Nabua</p>
                                                                </div>
                                                                <div class="right-content">
                                                                    <span>7:01 am</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr> 
                                                <tr class="items" data-label="item-1" style="cursor: pointer;">
                                                    <td>
                                                        <div class="d-flex align-items-center py-1 py-xxl-3">
                                                            <div class="location-icon bg-primary">
                                                                <i class="bi bi-geo-alt-fill display-5"></i>
                                                            </div>
                                                            <div class="request-item-content w-100 ms-4">
                                                                <div class="left-content">
                                                                    <span class="display-7">Pickup Point</span>
                                                                    <p class="text-black fw-bold">San Miguel, Nabua</p>
                                                                </div>
                                                                <div class="right-content">
                                                                    <span>7:01 am</span>
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
                    </div>
                </section>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    

                });
            </script>

<?= $this->endSection(); ?>