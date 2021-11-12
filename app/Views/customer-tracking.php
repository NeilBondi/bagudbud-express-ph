<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
<?= $this->extend('layouts/base_no_nav.php') ?> 

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
<?= $this->section('content'); ?>
    <div class="container">
        <div class="nav logo mt-4" style="height: 2.5rem;">
            <img class="img-fluid" src="<?= base_url('/public/assets/img/Artboard 12@72x-8.png')?>" alt="">
        </div>
        <div class="main d-flex flex-column align-items-center p-2 p-sm-3">
            <p class="display-2 text-center fw-bolder text-black">It’s the products and items you love</p>
            <form action="" method="post" id="search-tracking-form" style="max-width: 40rem; width:100%">
                <label for="search-tracking" class="display-7 mt-5 pb-2 text-center w-100">Monitor your delivery status with just a few click</label>
                <div class="d-flex flex-column flex-sm-row input-container">
                    <input type="text" class="form-control form-control-sm py-3 fw-lighter rounded-0" name="search-tracking" id="search-tracking">
                    <button class="btn btn-primary ms-2 search-tracking-btn px-5 text-white fw-bolder display-6 rounded-0">Search</button>
                </div>
            </form>
            <div class="row d-flex justify-content-center mt-5 w-100" style="max-width: 50rem;">
                <div class="d-inline-flex justify-content-md-center flex-column flex-md-row" style="min-height: 15rem;">
                    <div class=" d-flex justify-content-center">
                        <p class="text-center">Find your request</p>
                    </div>
                    <div class="no-request d-none d-flex justify-content-center">
                        <p class="text-center">No Request Found</p>
                    </div>
                    <div class="result w-100 d-none d-flex">
                        <table class="table table-bordered stable-striped" style="border-radius: 50%;">
                            <tbody>
                                <tr>
                                    <th class="ps-sm-5">Tracking No.</th>
                                    <td class="ps-sm-5">12134567890</td>
                                </tr>
                                <tr>
                                    <th class="ps-sm-5" >Booking Date</th>
                                    <td class="ps-sm-5">01/01/2021</td>
                                </tr>
                                <tr>
                                    <th class="ps-sm-5">Delivery Mans's Name</th>
                                    <td class="ps-sm-5">John Doe</td>
                                </tr>
                                <tr>
                                    <th class="ps-sm-5" >Client's Name</th>
                                    <td class="ps-sm-5">John Doe</td>
                                </tr>
                                <tr>
                                    <th class="ps-sm-5">City of Client</th>
                                    <td class="ps-sm-5">Nabua</td>
                                </tr>
                                <tr>
                                    <th class="ps-sm-5" >Status</th>
                                    <td class="ps-sm-5">Delivery Request</td>
                                </tr>
                                <tr>
                                    <th class="ps-sm-5">Delivery Date and Time</th>
                                    <td class="ps-sm-5">01/01/2021 7:00am</td>
                                </tr>
                                <tr>
                                    <th class="ps-sm-5" >Recipient Name</th>
                                    <td class="ps-sm-5">John Doe</td>
                                </tr>
                                <tr>
                                    <th class="ps-sm-5">Recipient Address</th>
                                    <td class="ps-sm-5">Nabua</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
                $(() => {
                    
                    $('#search-tracking').keyup(function() {
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
                    $('#search-tracking-form').submit(function(event) {
                        event.preventDefault();

                        if ($('#search-tracking').val()) {
                            $('.no-request').addClass('d-none')
                            $('.result').removeClass('d-none')

                        } else {
                            $('.no-request').removeClass('d-none')
                            $('.result').addClass('d-none')
                            $('.no-request').prev().addClass('d-none');
                        }
                    })
                })
            </script>
<?= $this->endSection(); ?>