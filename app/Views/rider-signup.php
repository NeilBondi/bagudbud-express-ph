<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
<?= $this->extend('layouts/base_no_nav.php') ?> 

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
<?= $this->section('content'); ?>
    <div class="con container-fluid h-full">
        <div class="row d-flex h-100">

            <!-- left container -->

            <div class="col col-lg-3 position-relative p-0 d-none d-md-block">
                <div class="row position-fixed w-26 h-100 p-0 bg-primary d-flex flex-column justify-content-center align-items-end">
                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="container-fluid d-flex flex-column px-5">
                            <a href="<?= base_url('/rider-login'); ?>" class="border border-outline-secondary position-relative d-flex justify-content-center align-items-center text-decoration-none display-9 fw-bold rounded bg-white text-black mb-4 p-2 p-xxl-3">
                                Already have an account? Sign in
                            </a>
                        </div>
                    </div>
                    <div class=" col left-links d-flex flex-column justify-content-end align-items-center display-8 text-white pb-4">
                        <div class="links">
                            <a href="#" class="link-light text-decoration-none pe-md-1 pe-2">Terms and Conditions</a> 
                            | 
                            <a href="#" class="link-light text-decoration-none ps-md-1 ps-2">Privacy Policy</a>
                        </div>
                        <span class="display-8">All Rights Reserved 2021</span>
                    </div>
                </div>
            </div>

            <!-- right container -->

            <div class="col col-md-8 px-xl-5 mx-auto py-5 my-4">  
                <form action="<?= base_url('/email-verification') ?>" class="container">

                    <div class="row row-cols-1 row-cols-lg-2 mb-5">
                        <div class="col d-flex justify-content-center align-items-center px-1 px-lg-2 px-xxl-5">
                            <img src="<?= base_url('/public/assets/img/Logo.svg'); ?>" class="w-75 img-fluid" alt="logo">
                        </div>
                        <span class="col"></span>
                    </div>

                    <!-- Title row -->

                    <div class="row row-cols-1 row-cols-lg-2">
                        <div class="col d-flex flex-column px-1 px-lg-2 px-xxl-5">
                            <div class="d-inline-flex">
                                <span class="signin-title title position-relative display-4 fw-bolder mt-2 mb-4">Sign up</span>
                            </div>
                        </div>
                        <div class="col-6 px-1 px-lg-2 px-xxl-5"></div>
                    </div>

                    <!-- First name and Last name row -->

                        <!-- First name -->

                    <div class="row row-cols-1 row-cols-lg-2">
                        <div class="col ps-1 ps-lg-2 ps-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <label for="first-name" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">First name</label>
                                <input type="text" name="first-name" class="form-control form-control-sm py-2 py-xxl-3 fw-lighter" id="first-name" placeholder="First name">
                            </div>
                        </div>

                        <!-- Last name -->

                        <div class="col ps-1 pe-lg-2 pe-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <label for="last-name" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Last name</label>
                                <input type="text" name="last-name" class="form-control form-control-sm py-2 py-xxl-3 fw-lighter" id="last-name" placeholder="Last name">
                            </div>
                        </div>
                    </div>

                    <!-- Gender and Birthdate row -->

                        <!-- Gender -->

                    <div class="row row-cols-1 row-cols-lg-2">
                        <div class="col ps-1 ps-lg-2 ps-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <label for="gender" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Gender</label>
                                <select name="gender" class="form-select form-select-md py-xl-2 py-xxl-3 fw-lighter" id="gender" aria-label="Default select example">
                                    <option selected>Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <!-- Birthday -->

                        <div class="col ps-1 pe-lg-2 pe-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <label for="gender" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Birthdate</label>
                                <input type="date" name="birthdate" id="dirthdate" class="form-control form-control-sm py-2 py-xxl-3 fw-lighter">
                            </div>
                        </div>
                    </div>           

                    <!-- <hr class="border border-0 border-top-1 border-black opacity-10"> -->

                    <!-- Phone Number and Email row -->

                        <!-- Phone number -->

                    <div class="row row-cols-1 row-cols-lg-2 mt-3">
                        <div class="col ps-1 ps-lg-2 ps-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <label for="phone-number" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Phone number</label>
                                <input type="number" name="phone-number" class="form-control form-control-sm py-2 py-xxl-3 fw-lighter" id="phone-number" placeholder="Phone number">
                            </div>
                        </div>

                        <!-- Email -->

                        <div class="col ps-1 pe-lg-2 pe-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <label for="email" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Email</label>
                                <input type="email" name="email" class="form-control form-control-sm py-2 py-xxl-3 fw-lighter" id="email" placeholder="Email">
                                <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error message!</span>
                            </div>
                        </div>
                    </div>

                    <!-- Password and Confirm Password row -->

                        <!-- Password -->

                    <div class="row row-cols-1 row-cols-lg-2">
                        <div class="col ps-1 ps-lg-2 ps-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <label for="password" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Password</label>
                                <input type="password" name="password" class="form-control form-control-sm py-2 py-xxl-3 fw-lighter" id="password" placeholder="Password">
                                <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error message!</span>
                            </div>
                        </div>

                        <!-- Confirm Password -->

                        <div class="col ps-1 pe-lg-2 pe-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <label for="confirm-password" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Confirm Password</label>
                                <input type="password" name="confirm-password" class="form-control form-control-sm py-2 py-xxl-3 fw-lighter" id="confirm-password" placeholder="Confirm Password">
                                <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error message!</span>
                            </div>
                        </div>
                    </div>

                    <!-- Municipality and Barangay row -->

                        <!-- Municipality -->

                    <div class="row row-cols-1 row-cols-lg-2 mt-3">
                        <div class="col ps-1 ps-lg-2 ps-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                            <label for="municipality" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Municipality</label>
                                <input class="form-control form-control-sm py-2 py-xxl-3 fw-lighter" list="municipality-list" id="municipality" placeholder="Municipality">
                                <datalist id="municipality-list">
                                    <option value="Baao">
                                    <option value="Bato">
                                    <option value="Balatan">
                                    <option value="Bula">
                                    <option value="Buhi">
                                    <option value="Nabua">
                                    <option value="Iriga City">
                                </datalist>
                            </div>
                        </div>

                        <!-- Barangay -->

                        <div class="col ps-1 pe-lg-2 pe-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <label for="barangay" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Barangay</label>
                                <input type="text" name="barangay" class="form-control form-control-sm py-2 py-xxl-3 fw-lighter" id="barangay" placeholder="Barangay">
                            </div>
                        </div>
                    </div>

                    <!-- Zone or Street -->

                    <div class="row row-cols-1 row-cols-lg-2">
                        <div class="col ps-1 ps-lg-2 ps-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <label for="zone-street" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Zone / Street</label>
                                <input type="text" name="zone-street" class="form-control form-control-sm py-2 py-xxl-3 fw-lighter" id="zone-street" placeholder="Zone or Street">
                            </div>
                        </div>
                    </div>

                    <!-- Rider Vehicle type Name -->

                    <div class="row row-cols-1 row-cols-lg-2 mt-3">
                        <div class="col ps-1 ps-lg-2 ps-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <label for="vehicle-type" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Vehicle Type</label>
                                <div class="d-flex pt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="vehicle-type form-check-input fw-lighter" type="radio" name="vehicle" checked id="motorcycle" value="motorcycle">
                                        <label class="form-check-label display-7" for="motorcycle">Motorcycle</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="vehicle-type form-check-input fw-lighter" type="radio" name="vehicle" id="bicycle" value="bicycle">
                                        <label class="form-check-label display-7" for="bicycle">Bicycle</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Terms and Conditions -->

                    <div class="row row-cols-1 mt-3">
                        <div class="col ms-1 ms-lg-2 ms-xxl-5 form-check form-check-inline mt-xxl-3 mb-lg-2">
                            <input class="form-check-input" type="checkbox" id="notif-checkbox" value="">
                            <label class="form-check-label fw-lighter display-7" for="notif-checkbox">Yes, I want to recieve notifications from <a href="" class="a-link2 position-relative text-decoration-none text-black fw-bold">Bagudbud Express</a></label>
                        </div>
                        <div class="col ms-1 ms-lg-2 ms-xxl-5 form-check form-check-inline mt-xxl-3 mb-lg-2">
                            <input class="form-check-input" type="checkbox" id="terms-and-policies" value="">
                            <label class="form-check-label fw-lighter display-7" for="terms-and-policies">I agree to the 
                                <a href="" class="a-link2 position-relative text-decoration-none text-black fw-bold">Terms and Services</a> 
                                and
                                <a href="" class="a-link2 position-relative text-decoration-none text-black fw-bold">Privacy policy</a>
                            </label>
                        </div>
                    </div>

                    <!-- buttons -->

                    <div class="col ps-1 pe-1 pe-lg-2 pe-xxl-5 mt-4 mb-0 pb-0">
                        <div class="d-flex flex-row-reverse justify-content-start align-items-center h-100">
                            <button type="submit" class="submit-btn btn btn-primary border-2 text-black mt-3 px-4 px-xxl-5 py-xxl-2">
                                <span class="display-6 fw-bold text-white">Next</span>
                            </button>
                            <a href="<?= base_url(); ?>/login" class="btn btn-transparent button-active-transparent text-black mt-3 me-2 px-3 px-xxl-5 py-2">
                                <span class="display-7 fw-normal">Return</span>
                            </a>
                        </div>
                    </div>
                </form>


                <!-- Requirements and other documents -->

                <div class="container d-flex mt-5 pt-3 border-top">
                    <div class="card-group">
                        <div class="card border-0">
                            <div class="card-body">
                                <h5 class="card-title display-4 fw-bolder position-relative">Requirements</h5>
                                <p class="card-text display-6 fw-bold">For Riders</p>
                                <ul>
                                    <li class="card-text display-7 py-2 lh-base">Have a Professional License (Mandatory)</li>
                                    <li class="card-text display-7 py-2 lh-base">Must be 18-55 Years Old</li>
                                    <li class="card-text display-7 py-2 lh-base">Drug test Clearance</li>
                                    <li class="card-text display-7 py-2 lh-base">NBI Clearance</li>
                                </ul>
                                <p class="card-text display-6 fw-bold">For Bicycle</p>
                                <ul>
                                    <li class="card-text display-7 py-2 lh-base">Any Gvernment Issued ID</li>
                                    <li class="card-text display-7 py-2 lh-base">Must be 21-50 Years Old</li>
                                    <li class="card-text display-7 py-2 lh-base">Drug test Clearance</li>
                                    <li class="card-text display-7 py-2 lh-base">NBI Clearance</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body">
                                <h5 class="card-title display-4 fw-bolder position-relative">Documents</h5>
                                <p class="card-text display-6 fw-bold">For Riders</p>
                                <ul>
                                    <li class="card-text display-7 py-2 lh-base">OR/CR</li>
                                    <li class="card-text display-7 py-2 lh-base">Year Model 2013 above</li>
                                    <li class="card-text display-7 py-2 lh-base">100-155 Displacement</li>
                                    <li class="card-text display-7 py-2 lh-base">We don't accept China Brand Motorcycles</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-body">
                                <h5 class="card-title display-4 fw-bolder position-relative">Next Steps</h5>
                                <ul>
                                    <li class="card-text display-7 py-2 lh-base">Get or request for your LTO Professional Driver's License be updated to Professional</li>
                                    <li class="card-text display-7 py-2 lh-base">Schedule your appointment for NBI issuance or renewal</li>
                                    <li class="card-text display-7 py-2 lh-base">Take Drug Testing at any diagnostic clinics near you</li>
                                    <li class="card-text display-7 py-2 lh-base">Attend and complete your online driver training</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        const vehicleType = document.querySelectorAll('.vehicle-type');
        const forRiders = document.querySelector('.for-riders');
        const forBikers = document.querySelector('.for-bikers');
        vehicleType.forEach(element => {
            element.addEventListener('change', () => {
                if (element.id !== "motorcycle") {
                    forRiders.classList.toggle('d-none');
                    forBikers.classList.toggle('d-none');
                } else {
                    forRiders.classList.toggle('d-none');
                    forBikers.classList.toggle('d-none');
                }
            });
        });
    </script>
<?= $this->endSection(); ?>