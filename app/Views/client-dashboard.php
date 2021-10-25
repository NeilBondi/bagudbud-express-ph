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
                    <div class="col-12">
                        <div class="row d-flex justify-content-center">
                            <div class="col-12 col-lg-3 col-md-4">
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
                            <div class="col-6 col-lg-3 col-md-4">
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
                            <div class="col-6 col-lg-3 col-md-4">
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
                            <div class="col-lg-3 col-md-3 d-none d-lg-flex">
                                <div class="card w-100">
                                    <div class="card-body px-4 px-md-3 py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xl">
                                                <img src="<?= base_url('/public/assets/dashboard/images/faces/1.jpg')?>" alt="Face 1">
                                            </div>
                                            <div class="ms-3 name">

                                                <!-- Insert Client Name -->

                                                <h5 class="font-bold text-black">John Duck</h5>

                                                <!-- Insert Client Email -->

                                                <h6 class="text-muted mb-0">@johnducky</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-black">Active Deliveries</h4>
                                    </div>
                                    <div class="px-5 mx-md-3 mb-5">
                                        <table class="table table-hover table-container">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Recipient</th>
                                                    <th scope="col" class="text-center">Delivery Fee</th>
                                                    <th scope="col" class="text-end">Date Added</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- item start -->
                                                
                                                <tr class="items" style="cursor: pointer;">
                                                    <td>
                                                        <div class="py-2">
                                                            <!-- insert id here -->
                                                            <input type="text" name="id" id="id" value="1" hidden>
                                                            <!-- Recipient name -->
                                                            <h6 class="my-0 text-black"><b>John Doe</b></h6>
                                                            <!-- addres -->
                                                            <p class="my-0">San Miguel, Nabua</p>
                                                            <!-- Package Price -->
                                                            <h5 class="my-0 text-primary">Php 500.00</h5>
                                                        </div>
                                                    </td>
                                                    <!-- Delivery Fee -->
                                                    <td class="text-center">PHP 50.00</td> 
                                                    <!-- Date added -->
                                                    <td class="text-end pe-3 pe-md-4">7:02 pm</td>
                                                </tr>

                                                <!-- item end -->

                                                <tr class="items" style="cursor: pointer;">
                                                    <td>
                                                        <div class="py-2">
                                                            <h6 class="my-0 text-black"><b>John Doe</b></h6>
                                                            <p class="my-0">San Miguel, Nabua</p>
                                                            <h5 class="my-0 text-primary">Php 500.00</h5>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">PHP 50.00</td>
                                                    <td class="text-end pe-3 pe-md-4">7:02 pm</td>
                                                </tr>
                                                <tr class="items" style="cursor: pointer;">
                                                    <td>
                                                        <div class="py-2">
                                                            <h6 class="my-0 text-black"><b>John Doe</b></h6>
                                                            <p class="my-0">San Miguel, Nabua</p>
                                                            <h5 class="my-0 text-primary">Php 500.00</h5>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">PHP 50.00</td>
                                                    <td class="text-end pe-3 pe-md-4">7:02 pm</td>
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

<?= $this->endSection(); ?>