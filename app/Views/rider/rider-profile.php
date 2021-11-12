<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
<?= $this->extend('rider/dashboardDeliveriesLayout.php') ?> 

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
                            <div class="card-body position-relative"  style="max-width: 50rem; width: 100%">
                                <form action="" method="post" id="profile-form">
                                    <div class="inner-container px-3 px-lg-5 d-flex flex-column align-items-center">
                                        <div class="profile-con avatar avatar-xxl border border-2 border-primary position-relative">
                                            <img class="profile-avatar-image" src="<?= base_url('/public/assets/dashboard/images/faces/1.jpg')?>" alt="Face 1">
                                            <div class="overlay position-absolute w-100 h-100 rounded-circle overflow-hidden d-flex justify-content-center align-items-center">
                                                <span class="fw-bold" style="opacity: 0.7;">Change Profile Image</span>
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

                                        <!-- Email -->

                                        <div class="row w-100">
                                            <div class="col">
                                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                                <label for="email" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Email</label>
                                                    <input type="email" name="email" class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary" id="email" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Phone Number -->

                                        <div class="row w-100">
                                            <div class="col">
                                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                                    <label for="phone-number" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Phone Number</label>
                                                    <input type="number" name="phone-number" class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary" id="phone-number" placeholder="Phone Number">
                                                    <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error message!</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-lg-2 w-100">

                                            <!-- Municipality -->

                                            <div class="col">
                                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                                    <label for="municipality" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Municipality</label>
                                                    <select class="form-select form-select-sm py-2 fw-lighter border-primary bg-light-primary" aria-label=".form-select-sm example" name="Municipality" id="Municipality">
                                                        <option value="Baao">Baao</option>
                                                        <option value="Bato">Bato</option>
                                                        <option value="Balatan">Balatan</option>
                                                        <option value="Bula">Bula</option>
                                                        <option value="Buhi">Buhi</option>
                                                        <option value="Nabua">Nabua</option>
                                                        <option value="Iriga City">Iriga City</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Barangay -->

                                            <div class="col">
                                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                                    <label for="barangay" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Zone/street, Barangay</label>
                                                    <input type="text" name="barangay" class="form-control form-control-sm py-2 fw-lighter border-primary bg-light-primary" id="barangay" placeholder="Barangay">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row w-100">
                                            <div class="col">
                                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                                    <label for="vehicle-type" class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Vehicle Type</label>
                                                    <select class="form-select form-select-sm py-2 fw-lighter border-primary bg-light-primary" aria-label=".form-select-sm example" name="vehicle-type" id="vehicle-type">
                                                        <option value="Motorcycle">Motorcycle</option>
                                                        <option value="Bicycle">Bicycle</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5 w-100">
                                            <!-- Profile avatar -->
                                            <input type="text" hidden name="profile-avatar" id="profile-avatar">

                                            <!-- Submit btn -->
                                            <input type="submit" class="btn btn-primary px-5 py-2" value="Save">
                                        </div>
                                    </div>
                                </form>
                                <div class="avatar-container d-none bg card" style="max-width: 35rem; width: 100%">
                                    <div class="p-4">
                                        <h5 class="text-black pb-4">Choose Avatar</h5>
                                        <form action="" method="post" id="avatar-form" class="d-flex flex-column">
                                            <div class="row">
                                                <div class="col-3 p-3 d-flex align-items-center justify-content-center">
                                                    <div class="avatar-con avatar avatar avatar-xl2 position-relative">
                                                        <img src="<?= base_url('/public/assets/dashboard/images/faces/1.jpg')?>" alt="Face 1">
                                                        <input type="radio" name="avatar" id="avatar-icons" value="<?= base_url('/public/assets/dashboard/images/faces/1.jpg')?>">
                                                        <span class="border-overlay"></span>
                                                    </div>
                                                </div>
                                                <div class="col-3 p-3 d-flex align-items-center justify-content-center">
                                                    <div class="avatar-con avatar avatar-xl2 position-relative">
                                                        <img src="<?= base_url('/public/assets/dashboard/images/faces/2.jpg')?>" alt="Face 1">
                                                        <input type="radio" name="avatar" id="avatar-icons" value="<?= base_url('/public/assets/dashboard/images/faces/2.jpg')?>">
                                                        <span class="border-overlay"></span>
                                                    </div>
                                                </div>
                                                <div class="col-3 p-3 d-flex align-items-center justify-content-center">
                                                    <div class="avatar-con avatar avatar-xl2 position-relative">
                                                        <img src="<?= base_url('/public/assets/dashboard/images/faces/3.jpg')?>" alt="Face 1">
                                                        <input type="radio" name="avatar" id="avatar-icons" value="<?= base_url('/public/assets/dashboard/images/faces/3.jpg')?>">
                                                        <span class="border-overlay"></span>
                                                    </div>
                                                </div>
                                                <div class="col-3 p-3 d-flex align-items-center justify-content-center">
                                                    <div class="avatar-con avatar avatar-xl2 position-relative">
                                                        <img src="<?= base_url('/public/assets/dashboard/images/faces/4.jpg')?>" alt="Face 1">
                                                        <input type="radio" name="avatar" id="avatar-icons" value="<?= base_url('/public/assets/dashboard/images/faces/4.jpg')?>">
                                                        <span class="border-overlay"></span>
                                                    </div>
                                                </div>
                                                <div class="col-3 p-3 d-flex align-items-center justify-content-center">
                                                    <div class="avatar-con avatar avatar-xl2 position-relative">
                                                        <img src="<?= base_url('/public/assets/dashboard/images/faces/5.jpg')?>" alt="Face 1">
                                                        <input type="radio" name="avatar" id="avatar-icons" value="<?= base_url('/public/assets/dashboard/images/faces/5.jpg')?>">
                                                        <span class="border-overlay"></span>
                                                    </div>
                                                </div>
                                                <div class="col-3 p-3 d-flex align-items-center justify-content-center">
                                                    <div class="avatar-con avatar avatar-xl2 position-relative">
                                                        <img src="<?= base_url('/public/assets/dashboard/images/faces/6.jpg')?>" alt="Face 1">
                                                        <input type="radio" name="avatar" id="avatar-icons" value="<?= base_url('/public/assets/dashboard/images/faces/6.jpg')?>">
                                                        <span class="border-overlay"></span>
                                                    </div>
                                                </div>
                                                <div class="col-3 p-3 d-flex align-items-center justify-content-center">
                                                    <div class="avatar-con avatar avatar-xl2 position-relative">
                                                        <img src="<?= base_url('/public/assets/dashboard/images/faces/7.jpg')?>" alt="Face 1">
                                                        <input type="radio" name="avatar" id="avatar-icons" value="<?= base_url('/public/assets/dashboard/images/faces/7.jpg')?>">
                                                        <span class="border-overlay"></span>
                                                    </div>
                                                </div>
                                                <div class="col-3 p-3 d-flex align-items-center justify-content-center">
                                                    <div class="avatar-con avatar avatar-xl2 position-relative">
                                                        <img src="<?= base_url('/public/assets/dashboard/images/faces/8.jpg')?>" alt="Face 1">
                                                        <input type="radio" name="avatar" id="avatar-icons" value="<?= base_url('/public/assets/dashboard/images/faces/8.jpg')?>">
                                                        <span class="border-overlay"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary mt-5 py-2">Done</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script type="text/javascript">
                $(() => {

                    $(document).click((event) => {
                        if(event.target.tagName === 'BODY') {
                            $('.avatar-container').addClass('d-none');
                            $('body').removeClass('popup-blur-active');
                        }
                        
                    })  

                    let $currentProfile = $('.profile-con').children().first()
                    $('.profile-con').click(() => {
                        $('.avatar-container').removeClass('d-none');
                        $('body').addClass('popup-blur-active');

                        let $inputs = $('input[name=avatar')
                        
                        $inputs.each(function() {
                            
                            $(this).change(function() {
                                $inputs.each(function() {
                                    $(this).next().removeClass('active')
                                })
                                $(this).attr('selected', 'true')
                                $(this).next().addClass('active')
                            })
                            if ($(this).val() === $currentProfile.attr('src')) {
                                $(this).attr('selected', 'true')
                                $(this).next().addClass('active')
                                
                            }
                        })
                    })

                    $('#avatar-form').submit(function(e) {
                        e.preventDefault();
                        let $data = $('#avatar-form').serializeArray()

                        // insert on success
                        $currentProfile.attr('src', $data[0].value)
                        $('#profile-avatar').val($data[0].value);
                        setTimeout(() => {
                            $('.avatar-container').addClass('d-none');
                            $('body').removeClass('popup-blur-active');
                        }, 750)
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

                        // profile form
                        const $parent = $('.inner-container');
                        let inputs = $('#profile-form').serializeArray();
                        $.ajax({
                            url: "<?= base_url('ClientProfile/getUserData'); ?>",
                            method: "GET",
                            dataType: "json",
                            data: '',
                            success: function (res) {
                                for (const key in res) {
                                    inputs.map((el) => {
                                        if (key === el.name) {
                                            if (key === 'gender' || key === 'product-name' || key === 'Municipality') {
                                                $parent.find(`select[name=${key}`).children().each(function() {
                                                    $(this).removeAttr('selected')
                                                    if (res[key].toLowerCase() === $(this).val().toLowerCase()) {
                                                        $(this).attr('selected', 'true')
                                                    }
                                                });
                                            } else if(key === 'profile-avatar') {
                                                $('#profile-avatar').val(res[key]);
                                                $('.profile-avatar-image').attr('src', res[key]);
                                            } else {
                                                $parent.find(`input[name=${key}`).val(res[key]);
                                            }
                                        }
                                    })
                                }
                            }
                        });
                })

                $(document).ready(function () {
                    var bool_number = true;

                    $('input[type=number]').keyup(function (e) {
                        var num = $(this).val(); 
                        var filter = /^(09|\+63)\d{9}$/;
                        if(filter.test(num)){
                            // alert('ok');
                            $(this).next().text('').addClass('d-none');
                            bool_number = true;
                        }else{
                            // alert('no');
                            $(this).next().text('Invalid Number').removeClass('d-none');
                            bool_number = false;
                        }
                    });
                        
                    $('#profile-form').submit(function (e) { 
                        e.preventDefault();
                        
                        if(bool_number){
                            var data = new FormData(this);
                            $.ajax({
                                type: "post",
                                url: "<?= base_url('ClientProfile/editProfile');?>",
                                data: data,
                                dataType: "json",
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function (res) {
                                    console.log(res);
                                    if(res.code == 505){
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: res.msg
                                        });
                                    }else{
                                        const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        timerProgressBar: false,
                                        didOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                        }
                                        })

                                        Toast.fire({
                                        icon: 'success',
                                        title: res.msg
                                        }).then(function(){
                                            $('#form')[0].reset();
                                            // $('body').removeClass('popup-blur-active');
                                            // $('.popup-container').removeClass('popup-active');
                                            // window.location.reload();
                                        });
                                    }
                                }
                            });
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!'
                            });
                        }
                    });

                    $('#delete-acc').click(function (e) { 
                        e.preventDefault();

                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3CD87A',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Continue!'
                            }).then((result) => {
                            if (result.isConfirmed) {
                               
                                $.ajax({
                                    type: "post",
                                    url: "<?= base_url('ClientProfile/deleteAccount');?>",
                                    data: '',
                                    dataType: "json",
                                    success: function (res) {
                                        if(res.code == 202){
                                            Swal.fire(
                                            'Deleted!',
                                            'Your account has been deleted.',
                                            'success'
                                            ).then(function(){
                                                location.href= "<?= base_url('/client-login')?>";
                                            })
                                        }
                                    }
                                });
                            }
                        })
                    });

                    // alert('ok');
                });
            </script>

<?= $this->endSection(); ?>