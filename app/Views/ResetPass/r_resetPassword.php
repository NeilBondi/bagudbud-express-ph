<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
<?= $this->extend('layouts/base_no_nav.php') ?>

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
<?= $this->section('content'); ?>

<div class="row container-fluid forgot-password-container bg-primary">
    <div class="col-3" style="max-width: 35rem !important; width: 100% !important">
        <div class="card px-5 py-4 rounded-3 shadow">
            <div class="h1 text-center fw-bold">
                Forgot Password
            </div>
            <div class="card-body d-flex flex-column p-0">
                <h5 class="card-title text-center mb-3">Enter your email address</h5>
                <form action="" method="post" class="d-flex flex-column" id="form">
                    <div id="alert" class="alert alert-danger text-center d-none" role="alert">
                        This email address does not exist!
                    </div>
                    <input type="email" name="email" class="form-control form-control py-2 fw-lighter" id="email" placeholder="example@example.com">
                    <button type="submit" class="btn btn-primary text-white fw-bolder display-6 mt-3">Continue</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#form').submit(function(e) {
            e.preventDefault();
            var email = $('#email').val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('PassReset/R_ResetPass/sendOTP') ?>",
                data: {
                    email: email
                },
                dataType: "json",
                success: function(res) {
                    console.log(res);
                    if (res.code == 505) {
                        $('#alert').text(res.msg).removeClass('d-none');
                    } else if (res.code == 500) {
                        location.href = `${res.redirect}?user-email=${res.user_email}`;
                    } else if (res.code == 506) {
                        alert(res.msg);
                    }
                }
            });
        });

    });
</script>
<?= $this->endSection('content'); ?>