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
                                        <div class="d-flex d-none flex-column justify-content-center invalid">
                                            <img src="<?= base_url('/public/assets/img/undraw_page_not_found_re_e9o6.svg') ?>" style="max-width:40rem" class="my-5 img-fluid" alt="">
                                            <h2 class="title-404 text-center mt-5">Not Found</h2>
                                            <h5 class="text-secondary fw-normal text-center mb-5">Please enter a valid Tracking Number</h5>
                                        </div>
                                        <div class="result w-100 d-none d-flex">
                                            <table class="table table-bordered stable-striped" style="border-radius: 50%;">
                                                <tbody id="tracking-details">
                                                    
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

                        var trackingId = $('#search').val();
                         $.ajax({
                             type: "post",
                             url: "<?= base_url('ClientDashboard/trackingDetails')?>",
                             data: {
                                 trackingId: trackingId
                             },
                             async: true,
                            //  dataType: "json",
                             success: function (data) {
                                if(data == 404) {
                                    $('.invalid').removeClass('d-none');
                                    $('.result').addClass('d-none');
                                } 
                                else {
                                    $('#tracking-details').html(data);
                                    $('.invalid').addClass('d-none');
                                    $('.result').removeClass('d-none');
                                }
                                $('.no-request').addClass('d-none');
                                
                                // alert('ok');
                             }
                         });

                        // if ($('#search').val()) {
                           
                        // } 
                        //else {
                        //     $('.no-request').removeClass('d-none')
                        //     $('.result').addClass('d-none')
                        //     $('.no-request').prev().addClass('d-none');
                        // }
                    })
                })
            </script>

<?= $this->endSection(); ?>