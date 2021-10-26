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
                    Forgot Password
                </div>
                <div class="card-body d-flex flex-column p-0">
                    <h5 class="card-title text-center mb-3">Enter your email address</h5>
                    <form action="" method="post" class="d-flex flex-column">
                        <div class="alert alert-danger text-center d-none" role="alert">
                            This email address does not exist!
                        </div>
                        <input type="email" name="email" class="form-control form-control py-2 fw-lighter" id="email" placeholder="example@example.com">
                        <button class="btn btn-primary text-white fw-bolder display-6 mt-3">Continue</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection('content'); ?>