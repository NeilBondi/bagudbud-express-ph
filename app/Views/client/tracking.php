<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
<?= $this->extend('dashboardDeliveries/dashboardDeliveriesLayout.php') ?> 

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
<?= $this->section('content'); ?>

            <div class="page-heading">
                <h3 class="text-black">Tracking</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="text-black">Search Tracking</h4>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <form action="post" class="col-11 col-md-9 d-inline-flex justify-content-center flex-column flex-md-row" id="search-form">
                                        <input type="text" name="search" class="form-control form-control-lg py-3 fw-lighter rounded-0" id="search" placeholder="Search">
                                        <button type="submit" name="submit" id="submit" class="btn btn-primary rounded-0 display-5 px-5 py-3 py-md-0 mt-3 mt-md-0 fw-bold">Search</button>
                                    </form>
                                </div>
                                <div class="row d-flex justify-content-center mt-5">
                                    <div class="col-11 col-md-9 d-inline-flex justify-content-md-center flex-column flex-md-row" style="min-height: 15rem;">
                                        <div class="d-flex justify-content-center">
                                            <p class="text-center">Find your request</p>
                                        </div>
                                        <div class="no-request d-none d-flex justify-content-center">
                                            <p class="text-center">No Request Found</p>
                                        </div>
                                        <div class="result w-100 d-none d-flex">
                                            <table class="table table-bordered stable-striped" style="border-radius: 50%;">
                                                <tbody>
                                                    <tr>
                                                        <th class="ps-5">Tracking No.</th>
                                                        <td class="ps-5">12134567890</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-5" >Booking Date</th>
                                                        <td class="ps-5">01/01/2021</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-5">Delivery Mans's Name</th>
                                                        <td class="ps-5">John Doe</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-5" >Client's Name</th>
                                                        <td class="ps-5">John Doe</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-5">City of Client</th>
                                                        <td class="ps-5">Nabua</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-5" >Status</th>
                                                        <td class="ps-5">Delivery Request</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-5">Delivery Date and Time</th>
                                                        <td class="ps-5">01/01/2021 7:00am</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-5" >Recipient Name</th>
                                                        <td class="ps-5">John Doe</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-5">Recipient Address</th>
                                                        <td class="ps-5">Nabua</td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                    
                    $('#search').keyup(function() {
                        const $des = $('.no-request').prev();
                        if (!$(this).val()) {
                            $des.removeClass('d-none');
                            $des.nextAll().each(function() {
                                $(this).addClass('d-none')
                            })
                        } else {
                            $des.addClass('d-none');
                            
                        }
                    })
                    $('#search-form').submit(function(event) {
                        event.preventDefault();

                        if ($('#search').val()) {
                            $('.no-request').addClass('d-none')
                            $('.result').removeClass('d-none')

                        } else {
                            $('.no-request').removeClass('d-none')
                            $('.result').addClass('d-none')
                        }
                    })
                })
            </script>

<?= $this->endSection(); ?>