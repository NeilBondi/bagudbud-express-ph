<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
<?= $this->extend('rider/dashboardDeliveriesLayout.php') ?> 

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
<?= $this->section('content'); ?>

            <div class="page-heading">
                <h3 class="text-black">Delete Account</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="text-black">Delete Account</h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="post" id="delete-form">
                                    <div class="inner-container px-3 px-lg-5 d-flex flex-column align-items-center"  style="max-width: 40rem; width: 100%">
                                        <div class="row w-100">
                                            <p style="text-indent: 3rem;">
                                            If you want to permanently delete your Bagudbud Express
                                            account, let us know, if possible we would like to hear from you
                                            the reason of deleting your account (use the field below) to
                                            improve our service. Bagudbud Express may retain certain
                                            information after account deletion. However, once the deletion
                                            process is complete, you will not be able to reactivate your
                                            account or retrieve any off the data or information you have
                                            provided.
                                            </p>
                                        </div>
                                        <div class="row w-100">

                                            <!-- Current Password -->

                                            <div class="col">
                                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                                    <textarea class="form-control fw-lighter border-primary bg-light-primary" placeholder="Your explanation is entirely optional" id="floatingTextarea2" style="height: 10rem"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="my-5 w-100">

                                            <!-- Submit btn -->
                                            <input type="submit" class="btn btn-primary px-5 py-2" value="Confirm">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="confirm-container container-fluid position-absolute top-50 start-50 translate-middle justify-content-center row">
                    <div class="card" style="max-width: 40rem; width: 100%;">
                        <div class="card-body">
                            <form method="post" class="" id="delete-confirm-form">
                                <div class="d-inline-flex">
                                    <h6 class="card-title position-relative text-black">Confirm with your Password</h5>
                                </div>
                                <div class="row">

                                    <!-- password -->

                                    <div class="col">
                                        <div class="mb-4 d-flex flex-column">
                                            <div class="position-relative">
                                                <input type="password" name="password" class="form-control form-control-sm py-2 fw-lighter border-dark" id="password" placeholder="Confirm Password">
                                                <span class="position-absolute top-50 translate-middle-y opacity-75" style="right: 1rem; cursor: pointer;">
                                                    <i class="password-icon bi bi-eye-slash d-flex align-items-center"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                
                                <div class="">
                                    <!-- Submit btn -->

                                    <!-- <button type="submit" class="btn btn-primary">Add</button> -->
                                    <input type="submit" class="btn btn-danger w-100 py-2" value="Delete Account">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <script>
                $(() => {

                    $('.password-icon').click(function() {
                        let getUrl = window.location;
                        let baseUrl = `${getUrl.protocol}//${getUrl.host}/${getUrl.pathname.split('/')[1]}`;
                        if ($(this).hasClass('bi-eye')) {
                            $(this).removeClass('bi-eye')
                            $(this).addClass('bi-eye-slash')
                            $(this).parent().prev().attr('type', 'password');
                        } else {
                            $(this).removeClass('bi-eye-slash')
                            $(this).addClass('bi-eye')
                            $(this).parent().prev().attr('type', 'text');
                        }
                    });

                    $('#delete-form').submit(function(event) {
                        event.preventDefault()

                        $('.confirm-container').addClass('popup-active');
                        $('body').addClass('popup-blur-active');
                    })

                    

                    $(document).click((e) => {
                        if (e.target.tagName === 'BODY') {
                            $('.confirm-container').removeClass('popup-active');
                            $('body').removeClass('popup-blur-active');
                        }
                    })
                })
            </script>

<?= $this->endSection(); ?>