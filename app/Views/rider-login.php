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

            <div class="col-6 p-0 d-none d-lg-block">
                <div class="row h-100">
                    <div class="col p-0 bg-primary d-flex justify-content-center align-items-end">
                        <div class="left-links d-flex flex-column justify-content-end align-items-center text-white pb-4">
                            <div class="links">
                                <a href="#" class="link-light text-decoration-none display-7 pe-md-1 pe-2">Terms and Conditions</a> 
                                | 
                                <a href="#" class="link-light text-decoration-none display-7 ps-md-1 ps-2">Privacy Policy</a>
                            </div>
                            <span class="display-8">All Rights Reserved 2021</span>
                        </div>
                    </div>
                    <div class="col p-0 d-flex justify-content-center align-items-center translate-slight-middle-x">
                        <img src="<?= base_url()?>/public/assets/img/image.svg" class="main-image img-fluid w-90" alt="">
                    </div>
                </div>
            </div>

            <!-- right container -->

            <div class="col container-fluid d-flex justify-content-lg-start justify-content-center align-items-center ms-0 ms-xxl-5 ps-0 ps-xxl-5 mt-5">
                <div class="row" style="width: 30rem;">
                    <div class="col form-container d-flex flex-column align-items-center">  
                        <img src="<?= base_url('/public/assets/img/Artboard 12@72x-8.png'); ?>" class="logo-form img-fluid w-90 mb-4 mb-xxl-5 px-5" alt="logo">
                        <form action="<?= base_url('RiderLogin/login'); ?>" method="POST" class="container d-flex flex-column">
                            <div class="d-inline-flex mb-2 mb-xxl-3">
                                <h3 class="signin-title title position-relative fw-bolder display-4">Sign in</h3>
                            </div>

                            <!-- Error message -->
                            <?php if(session()->getFlashdata('msg')):?>  
                            <div class="alert alert-danger d-flex justify-content-center align-items-center p-2 py-3" role="alert">
                                <p class="display-7 m-0 fw-normal"><?= session()->getFlashdata('msg') ?></p>
                            </div>
                            <?php endif;?>
                            <!-- End of error message -->


                            <div class="mb-2 mb-xxl-3">
                                <label for="emailOrUsername" class="form-label col-form-label col-form-label-sm display-7 fw-normal">Email or Username</label>
                                <input type="email" name="email" class="form-control form-control-sm py-2 py-xxl-3 fw-light" id="emailOrUsername" placeholder="Email or Username">
                            </div>
                            <div class="mb-1 mb-xxl-2">
                                <label for="password" class="form-label col-form-label col-form-label-sm display-7 fw-normal">Password</label>
                                <div class="position-relative">
                                    <input type="password" name="password" class="password-container form-control form-control-sm fw-light py-2 py-xxl-3 pe-5" id="password" placeholder="Password">
                                    <span class="form-opacity position-absolute top-50 translate-middle-y opacity-50" style="right: 1rem; cursor: pointer;">
                                        <img src="<?= base_url('/public/assets/img/blind.png') ?>" class="password-icon" style="width: 1.25rem;" alt="">
                                    </span>
                                </div>
                            </div>
                            <div class="join-now-container d-flex justify-content-between flex-row-reverse px-xl-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember Me
                                    </label>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <p class="overflow-hidden">
                                        <a href="<?= base_url('/r_resetPassword') ?>" class="display-7 fw-bold link-dark text-decoration-none position-relative overflow-hidden a-link ms-1 pb-0">Forgot Password?</a>
                                    </p>
                                </div>
                            </div>
                            <button type="submit" class="submit-btn btn btn-outline-primary border-2 btn-lg button-active-dark text-black position-relative mt-xxl-3">
                                <span class="display-6 fw-bold d-block p-xxl-2">Sign in</span>
                            </button>
                            <div class="join-now-container d-flex justify-content-center px-xl-1 mt-5 flex-column">
                                <div class="d-flex justify-content-center align-items-center">
                                    <p class="display-7">
                                        Don't have an account?
                                    </p>
                                    <p class="overflow-hidden">
                                        <a href="<?= base_url('/rider-signup') ?>" class="display-7 fw-bold link-dark text-decoration-none position-relative overflow-hidden a-link ms-1 pb-0">Join now</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(() => {
            $('.password-icon').click(function() {
                let getUrl = window.location;
                let baseUrl = `${getUrl.protocol}//${getUrl.host}/${getUrl.pathname.split('/')[2]}`;
                if ($(this).attr('src') === `${baseUrl}/public/assets/img/visible-eye.png`) {
                    $(this).attr('src', `${baseUrl}/public/assets/img/blind.png`);
                    $('.password-container').attr('type', 'password');
                } else {
                    $(this).attr('src', `${baseUrl}/public/assets/img/visible-eye.png`);
                    $('.password-container').attr('type', 'text');
                }
            });
        });
        // make the svg responsive
        // const svg = document.querySelector('svg');

        // svg.style.height = `${svg.parentElement.clientHeight}px`;
        // window.addEventListener('resize', () => {
        //     svg.style.height = `${svg.parentElement.clientHeight}px`;
        // });

        // const passwordIcon = document.querySelector('.password-icon');

        // passwordIcon.addEventListener();   
    </script>
<?= $this->endSection(); ?>