<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
<?= $this->extend('rider/dashboardDeliveriesLayout.php') ?> 

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
 <?php
    foreach($request as $row){

        if($row['mode_of_payment'] == 'COD'){
            $MOP = 'Cash on Delivery (COD)';
        }else{
            $MOP = 'Cash on Pickup (COP)';
        }
 ?>
<?= $this->section('content'); ?>
            <div class="page-heading">
                <h3 class="text-black">Dashboard</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card p-4">
                            <div class="card-header">
                                <h4 class="text-black">Request Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="section-headers row">
                                    <div class="col-8 mb-4">
                                        <button class="btn back-btn d-inline-flex align-items-center p-0">
                                            <i class="bi bi-arrow-left"></i>
                                            <span class="font-semibold ms-2">Back</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="details-content row px-md-4 px-md-5 mx-md-3 mb-md-5 mt-4" style="max-width: 60rem; width: 100%">
                                    <div class="col">
                                        <div class="row row-cols-1 row-cols-md-2" style="min-height: 8rem;">
                                            <div class="col">
                                                <div class="pickup-point d-flex">
                                                    <div class="con  me-5">
                                                        <p class="fw-semibold mb-2">Pickup point</p>

                                                        <!-- pickiup point ZONE STREET AND BARANGAY CITY -->

                                                        <p class="display-6 m-0 fw-bold text-black"><?php echo $row['Address'];?></p>
                                                        <p class="display-6 m-0 fw-bold text-black"><?php echo $row['Municipality'];?></p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <button class="clipboard btn btn-light-secondary" title="Copy to clipboard" value="Zone 4, San Miguel, Nabua"><i class="bi bi-clipboard"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mt-5 mt-md-0">
                                                <div class="delivery-point d-flex">
                                                    <div class="con  me-5">
                                                        <p class="fw-semibold mb-2">Delivery point</p>

                                                        <!-- delivery point ZONE STREET AND BARANGAY CITY -->

                                                        <p class="display-6 m-0 fw-bold text-black"><?php echo $row['recepient_address'];?></p>
                                                        <p class="display-6 m-0 fw-bold text-black"><?php echo $row['recepient_municipality'];?></p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <button class="clipboard btn btn-light-secondary" title="Copy to clipboard" value="Zone 4, San Miguel, Nabua"><i class="bi bi-clipboard"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-md-2" style="min-height: 8rem;">
                                            <div class="col mt-5 mt-md-0">
                                                <div class="pickup-point d-flex">
                                                    <div class="con  me-5">
                                                        <p class="fw-semibold mb-2">Client</p>

                                                        <!-- client NAME AND MOBILE NUMBER -->

                                                        <p class="display-6 m-0 fw-bold text-black"><?php echo $row['Name'].' '.$row['L_name']; ?></p>
                                                        <p class="display-6 m-0 fw-bold text-black"><?php echo $row['Contact_num']; ?></p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <a href="tel:<?php echo $row['Contact_num']; ?>" class="media-btns btn btn-light-secondary m-1" value="<?php echo $row['Contact_num']; ?>"><i class="bi bi-telephone"></i></a>
                                                        <a href="sms:<?php echo $row['Contact_num']; ?>" class="media-btns btn btn-light-secondary m-1" value="<?php echo $row['Contact_num']; ?>"><i class="bi bi-chat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mt-5 mt-md-0">
                                                <div class="delivery-point d-flex">
                                                    <div class="con  me-5">
                                                        <p class="fw-semibold mb-2">Recipient</p>

                                                        <!-- recipient NAME AND MOBILE NUMBER -->

                                                        <p class="display-6 m-0 fw-bold text-black"><?php echo $row['recepient_name']; ?></p>
                                                        <p class="display-6 m-0 fw-bold text-black"><?php echo $row['recepient_contactNum']; ?></p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <a href="tel:<?php echo $row['recepient_contactNum']; ?>" class="media-btns btn btn-light-secondary m-1" value="<?php echo $row['recepient_contactNum']; ?>"><i class="bi bi-telephone"></i></a>
                                                        <a href="sms:<?php echo $row['recepient_contactNum']; ?>" class="media-btns btn btn-light-secondary m-1" value="<?php echo $row['recepient_contactNum']; ?>"><i class="bi bi-chat"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row-cols-1 row-cols-md-2" style="min-height: 8rem;">
                                            <div class="col mt-5 mt-md-0">
                                                <div class="">
                                                    <p class="fw-semibold mb-2">Mode of Payment</p>

                                                    <!-- Mode of payment -->

                                                    <p class="display-6 m-0 fw-bold text-black"><?php echo $MOP;?></p>
                                                </div>
                                            </div>
                                            <div class="col mt-5 mt-md-0">
                                                <div class="">
                                                    <p class="fw-semibold mb-2">Product Type</p>

                                                    <!-- product type -->
                                                    
                                                    <p class="display-6 m-0 fw-bold text-black"><?php echo $row['product_name'];?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mt-5 mt-md-0 p-0">
                                                <div class="btns d-flex flex-column flex-sm-row">
                                                    <button class="cancel-delivery btn border-2 border-danger fw-bold py-2 mb-3 mb-sm-0 me-0 me-sm-2">Cancel Delivery</button>
                                                    <button class="message btn btn-primary border-2 py-2 border-primary fw-bold">Success</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="cancel-container container-fluid position-absolute top-50 start-50 translate-middle justify-content-center row">
                    <div class="card" style="max-width: 40rem; width: 100%;">
                        <div class="card-body">
                            <form method="post" class="" id="cancel-form">
                                <div class="d-inline-flex">
                                    <h6 class="card-title position-relative text-black">Reason</h5>
                                </div>
                                <div class="row">

                                    <!-- reason text area -->

                                    <div class="col">
                                        <div class="mb-4 d-flex flex-column">
                                            <div class="position-relative">
                                                <textarea class="form-control fw-lighter border-1 border-dark" placeholder="Your explanation is required" required id="floatingTextarea2" style="height: 10rem"></textarea>
                                                
                                            </div>
                                        </div>
                                    </div>
                                
                                <div class="">
                                    <!-- Submit btn -->

                                    <!-- <button type="submit" class="btn btn-primary">Add</button> -->
                                    <input type="submit" class="btn btn-danger w-100 py-2" value="Confirm">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="message-container container-fluid position-absolute top-50 start-50 translate-middle justify-content-center row">
                    <div class="card" style="max-width: 40rem; width: 100%;">
                        <div class="card-body">
                            <form method="post" class="" id="message-form" enctype="multipart/form-data">
                                <div class="d-inline-flex">
                                    <h6 class="card-title position-relative text-black">Insert Picture As Proofs</h5>
                                </div>
                                <div class="row">

                                    <div class="col">
                                        <div class="mb-4 d-flex flex-column">
                                            <div class="position-relative">
                                                <i class="exis bi bi-x fw-bolder d-none"></i>
                                                <div class="fw-lighter card m-0 border border-1 border-dark" style="height: 30rem; width:100%">
                                                    <figure class="img-container">
                                                        <img src="" alt="">
                                                        <figcaption id="img-title"></figcaption>
                                                    </figure>
                                                </div>
                                                <div class="insert-image">

                                                    <!-- img input -->

                                                    <input type="file" name="img" id="img-input" hidden accept="Image/*">
                                                    <label for="img-input" id="img-label">
                                                        <div>
                                                            <i class="bi bi-plus-circle"></i>
                                                            <p>Insert image here. Click here</p>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                <div class="">
                                    <!-- Submit btn -->

                                    <!-- <button type="submit" class="btn btn-primary">Add</button> -->
                                    <input type="submit" class="btn btn-primary w-100 py-2" value="Confirm">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script type="text/javascript">
                $(() => {
                 
                    let getUrl = window.location;
                    let baseUrl = `${getUrl.origin}/${getUrl.pathname.split('/')[1]}`;
                    let currentUrl = getUrl.pathname.split('/')[3];

                    $('.back-btn').click(() => {
                        location.href = `${baseUrl}/rider-dashboard/${currentUrl}`;
                    })
                    

                    const btnSize = () => {
                        let w = $('.btns').children().first().outerWidth()
                        $('.btns').children().last().css('width', w)
                    }
                    $(window).resize(btnSize)
                    btnSize()

                    $('.media-btns').each(function() {
                        $(this).click(function() {
                            $('.media-btns').each(function() {
                                $(this).children().first().css('color', '#000')
                                $(this).addClass('btn-light-secondary')
                                $(this).removeClass('btn-primary')
                            })

                            $(this).children().first().css('color', '#fff')
                            $(this).removeClass('btn-light-secondary')
                            $(this).addClass('btn-primary')

                            setTimeout(() => {
                                $(this).children().first().css('color', '#000')
                                $(this).addClass('btn-light-secondary')
                                $(this).removeClass('btn-primary')
                            }, 3000)
                        })
                    })

                    $('.clipboard').each(function() {
                        $(this).click(function() {
                            $('.clipboard').each(function() {
                                $(this).children().first().addClass('bi-clipboard')
                                $(this).children().first().removeClass('bi-clipboard-check')
                                $(this).children().first().css('color', '#000')
                                $(this).addClass('btn-light-secondary')
                                $(this).removeClass('btn-primary')
                            })

                            $(this).children().first().removeClass('bi-clipboard')
                            $(this).children().first().addClass('bi-clipboard-check')
                            $(this).children().first().css('color', '#fff')
                            $(this).removeClass('btn-light-secondary')
                            $(this).addClass('btn-primary')

                            let $temp = $('<input>')
                            $("body").append($temp);
                            $temp.val($(this).val()).select();
                            document.execCommand("copy");
                            $temp.remove();

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
                                title: 'Copied to Clipboard'
                            })
                        })
                    })

                    $('.cancel-delivery').click(function() {

                        $('.cancel-container').addClass('popup-active');
                        $('body').addClass('popup-blur-active');
                    })

                    $('.message').click(function() {
                        $('.message-container').addClass('popup-active');
                        $('body').addClass('popup-blur-active');
                    })

                    

                    $(document).click((e) => {
                        if (e.target.tagName === 'BODY' || e.target.classList.contains('message-container') || e.target.classList.contains('cancel-container')) {
                            $('.cancel-container').removeClass('popup-active');
                            $('.message-container').removeClass('popup-active');
                            $('body').removeClass('popup-blur-active');
                        }
                    })
                    
                    $('#img-input').change(function() {
                        var $input = $(this);
                        var inputFiles = this.files;
                        if(inputFiles == undefined || inputFiles.length == 0) return;
                        var inputFile = inputFiles[0];

                        var reader = new FileReader();
                        reader.onload = function(event) {
                            const imgInput = document.getElementById('img-input')
                            $input.parent().prev().find('img').attr("src", event.target.result);
                            $('.insert-image').addClass('d-none')
                            $('figcaption').text(imgInput.files[0].name)
                            $('.exis').removeClass('d-none')
                        };
                        reader.onerror = function(event) {
                            alert("ERROR: " + event.target.error.code);
                        };
                        reader.readAsDataURL(inputFile);
                    })

                    $('.exis').click(function() {
                        $('#img-input').parent().prev().find('img').attr("src", '');
                        $('.insert-image').removeClass('d-none')
                        $('figcaption').text('')
                        $(this).addClass('d-none')
                        $('#img-input').val('')
                    })

                });

                $(document).ready(function () {
                    $('#cancel-form').submit(function (e) { 
                        e.preventDefault();
                        var reason = $('#floatingTextarea2').val();
                        var req_id = <?php echo $row['req_id']; ?>;
                        var c_id = <?php echo $row['Client_id']; ?>;
                        var trackingNum = '<?php echo $row['tracking_id']; ?>';

                        $.ajax({
                            type: "post",
                            url: "<?= base_url('RiderDashboard/cancelDelivery')?>",
                            data: {
                                reason: reason,
                                req_id: req_id,
                                c_id: c_id,
                                trackingNum: trackingNum
                            },
                            dataType: "json",
                            success: function (res) {
                                if(res.code == 202){
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
                                        title: 'Canceled'
                                        }).then(function(){
                                            location.href= "<?= base_url('rider-dashboard/deliveries')?>";
                                        });                                 
                                }
                            }
                        });
                        // console.log(c_id);
                    });


                    $('#message-form').submit(function (e) { 
                        e.preventDefault();

                        var formdata = new FormData(this);
                        formdata.append('cid', <?php echo $row['Client_id'];?>);
                        formdata.append('req_id', <?php echo $row['req_id'];?>);
                        formdata.append('trackingNum', '<?php echo $row['tracking_id'];?>');

                        for (var pair of formdata.entries()) {
                            console.log(pair[0]+ ', ' + pair[1]); 
                        }

                        $.ajax({
                            type: "post",
                            url: "<?= base_url('RiderDashboard/successDelivery')?>",
                            data: formdata,
                            dataType: "json",
                            contentType: false,
                            processData: false,
                            success: function (res) {
                                if(res.code == 404){
                                    Swal.fire(
                                        'Opps!',
                                        'Invalid File Type',
                                        'warning'
                                    )
                                }
                                else if(res.code == 202){
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                        }
                                        })

                                        Toast.fire({
                                        icon: 'success',
                                        title: 'Delivered successfully'
                                        }).then(function(){
                                            location.href= "<?= base_url('rider-dashboard/deliveries')?>";
                                        })                                 
                                }
                                else if(res.code == 405 || res.code == 406){
                                    Swal.fire(
                                        'Opps!',
                                        'something went wrong, try again in few seconds',
                                        'warning'
                                    )
                                }
                            }
                        });
                     
                    });
                    
                });
            </script>
<?= $this->endSection(); ?>
<?php }

?>