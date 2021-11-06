<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
<?= $this->extend('dashboardDeliveries/dashboardDeliveriesLayout.php') ?> 

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
<?= $this->section('content'); ?>

            <div class="page-heading">
                <h3 class="text-black">Password and Security</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="text-black">Change Password</h4>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="inner-container px-3 px-lg-5 d-flex flex-column align-items-center"  style="max-width: 30rem; width: 100%">
                                        
                                        <div class="row w-100">

                                            <!-- Current Password -->

                                            <div class="col">
                                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                                    <label for="current-password" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Current Password</label>
                                                    <div class="position-relative">
                                                        <input type="password" name="password-container current-password" class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary" id="current-password" placeholder="Current Password">
                                                        <span class="position-absolute top-50 translate-middle-y opacity-75" style="right: 1rem; cursor: pointer;">
                                                            <i class="password-icon bi bi-eye-slash d-flex align-items-center"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row w-100">

                                            <!-- New Password -->

                                            <div class="col">
                                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                                    <label for="new-password" class="password-container fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">New Password</label>
                                                    <div class="position-relative">
                                                        <input type="password" name="new-password" class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary" id="new-password" placeholder="New Password">
                                                        <span class="position-absolute top-50 translate-middle-y opacity-75" style="right: 1rem; cursor: pointer;">
                                                            <i class="password-icon bi bi-eye-slash d-flex align-items-center"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row w-100">

                                            <!-- Confirm Password -->

                                            <div class="col">
                                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                                    <label for="confirm-password" class="password-container fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Confirm Password</label>
                                                    <div class="position-relative">
                                                        <input type="password" name="confirm-password" class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary" id="confirm-password" placeholder="Confirm Password">
                                                        <span class="position-absolute top-50 translate-middle-y opacity-75" style="right: 1rem; cursor: pointer;">
                                                            <i class="password-icon bi bi-eye-slash d-flex align-items-center"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-5 w-100">

                                            <!-- Submit btn -->
                                            <input type="submit" class="btn btn-primary px-5 py-2" value="Save" id="submit">
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

                    $('#submit').click(function (e) { 
                        e.preventDefault();
                        
                        var currentPass = $('#current-password').val();
                        var npass = $('#new-password').val();
                        if($('#new-password').val() == $('#confirm-password').val()){
                            $.ajax({
                            type: "post",
                            url: "<?= base_url('ClientProfile/checkPassword')?>",
                            data: {
                                cPass: currentPass
                            },
                            dataType: "json",
                            success: function (res) {
                                if(res.id == 202 ){
                                    $.ajax({
                                        type: "post",
                                        url: "<?= base_url('ClientProfile/updatePassword')?>",
                                        data: {
                                            npass: npass
                                        },
                                        dataType: "json",
                                        success: function (resData) {
                                            const Toast = Swal.mixin({
                                                toast: true,
                                                position: 'top-end',
                                                showConfirmButton: false,
                                                timer: 3000,
                                                timerProgressBar: false,
                                                didOpen: (toast) => {
                                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                }
                                                })
                                            if(resData.id == 202){
                                                Toast.fire({
                                                icon: 'success',
                                                title: 'Password Changed Successfully'
                                                }).then(function(){
                                                    window.location.reload();
                                                });
                                            }else{
                                                Toast.fire({
                                                icon: 'error',
                                                title: 'Password Can\'t be Update for now'
                                                }).then(function(){
                                                    window.location.reload();
                                                });
                                            }
                                        }
                                    });
                                    // alert('ok');
                                }
                                else{
                                    const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: false,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                    })
                                    Toast.fire({
                                    icon: 'error',
                                    title: 'Invalid Current Password!'
                                    }).then(function(){
                                        // window.location.reload();
                                    });
                                }
                            }
                        });
                        }else{
                            const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: false,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                            })
                            Toast.fire({
                            icon: 'error',
                            title: 'Confirm Password Not Match'
                            }).then(function(){
                                // window.location.reload();
                            });
                        }
                        
                    });
                })
            </script>

<?= $this->endSection(); ?>