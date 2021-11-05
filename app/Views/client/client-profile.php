<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
<?= $this->extend('dashboardDeliveries/dashboardDeliveriesLayout.php') ?> 

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
<?= $this->section('content'); ?>

            <div class="page-heading">
                <h3 class="text-black">Profile</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="text-black">My Profile</h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="inner-container px-3 px-lg-5 d-flex flex-column align-items-center"  style="max-width: 50rem; width: 100%">
                                        <div class="profile-con avatar avatar-xxl border border-2 border-primary position-relative">
                                            <img src="<?= base_url('/public/assets/dashboard/images/faces/1.jpg')?>" alt="Face 1">
                                            <div class="c position-absolute w-100 h-100 rounded-circle overflow-hidden" style="z-index: 10; width: 100%; height: 100%;">
                                                
                                                <!-- Profile Picture -->
                                            
                                                <input type="file" name="profile-image" id="profile-image" style="width: 100%; height: 100%; cursor: pointer; opacity: 0;">
                                            </div>
                                            <div class="overlay position-absolute w-100 h-100 rounded-circle overflow-hidden d-flex justify-content-center align-items-center">
                                                <span class="fw-bold">Change Profile Image</span>
                                            </div>
                                            <div class="con position-absolute translate-middle" style="top: 90%; right: -5%;">
                                                <div class="c bg-primary rounded-circle d-flex justify-content-center align-items-center" style="width: 2rem; height: 2rem">
                                                    <i class="bi bi-pencil-fill text-white display-8"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-lg-2 w-100 mt-5">

                                            <!-- First name -->

                                            <div class="col">
                                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                                    <label for="first-name" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">First Name</label>
                                                    <input type="text" name="first-name" class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary" id="first-name" placeholder="First Name">
                                                </div>
                                            </div>

                                            <!-- Last Name -->

                                            <div class="col">
                                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                                    <label for="last-name" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Last Name</label>
                                                    <input type="text" name="last-name" class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary" id="last-name" placeholder="Last Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-lg-2 w-100">

                                            <!-- Date of Birth -->

                                            <div class="col">
                                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                                    <label for="date-of-birth" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Date of Birth</label>
                                                    <input type="date" name="date-of-birth" class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary" id="date-of-birth" placeholder="Date of Birth">
                                                </div>
                                            </div>

                                            <!-- Gender -->

                                            <div class="col">
                                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                                    <label for="gender" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Gender</label>
                                                    <select class="form-select form-select-sm py-2 fw-lighter border-primary bg-light-primary" aria-label=".form-select-sm example" name="gender">
                                                        <option selected value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-lg-2 w-100">

                                            <!-- Email -->

                                            <div class="col">
                                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                                    <label for="email" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Email</label>
                                                    <input type="email" name="email" class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary" id="email" placeholder="Email">
                                                </div>
                                            </div>

                                            <!-- Phone number -->

                                            <div class="col">
                                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                                    <label for="phone-number" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Phone Number</label>
                                                    <input type="number" name="phone-number" class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary" id="phone-number" placeholder="Phone Number">
                                                    <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error message!</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Shop Name -->

                                        <div class="row w-100">
                                            <div class="col">
                                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                                    <label for="shop-name" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Shop Name</label>
                                                    <input type="text" name="shop-name" class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary" id="shop-name" placeholder="Shop Name">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Product Type -->

                                        <div class="row w-100">
                                            <div class="col">
                                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                                <label for="product-name" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Product Type</label>
                                                <select class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary" aria-label=".form-select-sm example" name="product-name">
                                                    <option selected>All</option>
                                                    <option value="Beauty Products">Beauty Products</option>
                                                    <option value="Fashion">Fashion</option>
                                                    <option value="Food">Food</option>
                                                    <option value="Gadgets">Gadgets</option>
                                                    <option value="Home Products">Home Products</option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-lg-2 w-100">

                                            <!-- Municipality -->

                                            <div class="col">
                                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                                    <label for="municipality" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Municipality</label>
                                                    <input type="text" name="municipality" class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary" id="municipality" placeholder="Municipality">
                                                </div>
                                            </div>

                                            <!-- Barangay -->

                                            <div class="col">
                                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                                    <label for="barangay" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Barangay</label>
                                                    <input type="text" name="barangay" class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary" id="barangay" placeholder="Barangay">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row w-100">

                                            <!-- Zone / Street -->

                                            <div class="col">
                                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                                    <label for="zone-street" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Zone / Street</label>
                                                    <input type="text" name="zone-street" class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary" id="zone-street" placeholder="Zone / Street">
                                                </div>
                                            </div>
                                        <div class="mt-5 w-100">

                                            <!-- Submit btn -->
                                            <input type="submit" class="btn btn-primary px-5 py-2" value="Save">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <script>
                $(() => {

                    $('.profile-con').click(() => {
                        // $('input[type=file]').click()
                    })
                    
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
                            $('.no-request').prev().addClass('d-none');
                        }
                    })
                })
            </script>

<?= $this->endSection(); ?>