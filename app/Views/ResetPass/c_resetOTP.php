<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
<?= $this->extend('layouts/base_no_nav.php') ?> 

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
<?= $this->section('content'); ?>

    <div class="row container-fluid forgot-password-container bg-primary">
        <div class="col-3">
            <div class="card px-5 py-4 rounded-3 shadow">
                <div class="h1 text-center fw-bold">
                    Code Verification
                </div>
                <div class="card-body d-flex flex-column p-0">
                    <form action="" method="post" class="d-flex flex-column" id="form">
                        <div id="alert" class="alert alert-danger text-center d-none fw-lighter" role="alert">
                            You've entered incorrect code!
                        </div>
                        <div class="alert alert-success text-center fw-lighter" role="alert">
                            We've sent a password reset otp code to your email - <span class="user-email"></span>
                        </div>
                        <input type="number" name="code" class="form-control form-control py-2 fw-lighter" id="code" placeholder="Enter Code">
                        <input type="hidden" name="" id="email" value="">
                        <button type="submit" class="btn btn-primary text-white fw-bolder display-6 mt-3">Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">       
        // jquery start
        $(() => {
            // get the query values in the url
            const urlSearchParams = new URLSearchParams(window.location.search);

            // insert the email in the DOM
            $('.user-email').text(urlSearchParams.get('user-email'));
            $('#email').val(urlSearchParams.get('user-email'));
        
        });

        $(document).ready(function () {
            $('#form').submit(function (e) { 
                e.preventDefault();
                
                var email = $('#email').val();
                var otp = $('#code').val();

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('PassReset/C_ResetPass/verifyOTP')?>",
                    data: {
                        otp: otp,
                        email: email
                    },
                    dataType: "json",
                    success: function(res) {
                        if(res.code == 506){
                            $('#alert').text(res.msg).removeClass('d-none');
                        }
                        else if(res.code == 500){
                            location.href = `${res.redirect}?user-email=${res.user_email}`;
                        }
                    }
                });

            });
        });
    </script>

<?= $this->endSection('content'); ?>