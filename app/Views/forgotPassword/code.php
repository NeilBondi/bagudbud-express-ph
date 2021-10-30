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
                    <form action="" method="post" class="d-flex flex-column">
                        <div class="alert alert-danger text-center error d-none fw-lighter" role="alert">
                            You've entered incorrect code!
                        </div>
                        <div class="alert alert-success  success text-center fw-lighter" role="alert">
                            We've sent a password reset otp to your email - example@example.com
                        </div>
                        <input type="number" name="code" class="form-control form-control py-2 fw-lighter" id="code" placeholder="Enter Code">
                        <button class="btn btn-primary text-white fw-bolder display-6 mt-3">Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(() => {
            $('.back-btn').click(() => {
                window.history.go(-3);
            })

            // $('.error').removeClass('d-none');
            // $('.error').addClass('d-none');
            // $('.success').addClass('d-none');
            // $('.success').removeClass('d-none');
        });
    </script>

<?= $this->endSection('content'); ?>