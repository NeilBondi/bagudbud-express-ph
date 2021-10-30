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
                    New Password
                </div>
                <div class="card-body d-flex flex-column p-0">
                    <form action="" method="post" class="d-flex flex-column" id="form">
                        <div class="alert alert-danger text-center d-none fw-lighter" role="alert">
                            You've entered incorrect code!
                        </div>
                        <div class="alert alert-success text-center fw-lighter" role="alert">
                            Please create a new password that you don't use on any other site.
                        </div>
                        <input type="password" name="password" class="form-control form-control py-2 fw-lighter" id="password" placeholder="Create new password">
                        <input type="password" name="confirm password" class="form-control form-control py-2 fw-lighter mt-3" id="confirm-password" placeholder="Confirm your new password">
                        <input type="hidden" name="" id="email" value="">
                        <button type="submit" class="btn btn-primary text-white fw-bolder display-6 mt-3">Change</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(() => {
            $('.back-btn').click(() => {
                window.history.go(-3);
            })
        });

        $(() => {
            // get the query values in the url
            const urlSearchParams = new URLSearchParams(window.location.search);

            // insert the email in the DOM
            $('.user-email').text(urlSearchParams.get('user-email'));
            $('#email').val(urlSearchParams.get('user-email'));
        
        });

    $(document).ready(function () {
        var bool_pass = true;
        var bool_cpass = true;
        var passcheck = true;

        $('#password').keyup(function (e) {  //check the passwotd length while typing
                if($(this).val().length < 8){
                    $('#password').css('border', '2px solid red');
                    return bool_pass = false;
                }
                else{
                    $('#password').css('border', '');
                    return bool_pass = true;
                }
        });

        $('#confirm-password').keyup(function (e) {
                var pass = $('#password').val();  //check the passwotd length while typing
                if($(this).val() != pass){
                    $('#confirm-password').css('border', '2px solid red');
                    bool_cpass = false;
                }
                else{
                    $('#confirm-password').css('border', '');
                    bool_cpass = true;
                    
                }
        });

        $('#form').submit(function (e) { 
            e.preventDefault();
            
            var newPass = $('#password').val();
            var CPass = $('#confirm-password').val();
            var email = $('#email').val();

            if(newPass == CPass){
               passcheck = true;
            }else{
                passcheck = false;
            }

            if(bool_cpass && bool_pass && passcheck){
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('PassReset/C_ResetPass/updatePass') ?>",
                    data: {
                        email: email,
                        newPass: newPass
                    },
                    dataType: "json",
                    success: function (res) {
                        if(res.code == 400){
                            Swal.fire({
                                icon: 'success',
                                title: 'You Have New Password',
                                text: res.msg,
                             }).then(function(){
                                 location.href= "<?= base_url('/client-login')?>";
                             });
                        }
                        else if(res.code == 404){
                            alert(res.msg);
                        }
                    }
                });
            }else{
                alert('check your passwwords');
            }
            
        });

        function refreshPage() {
            location.reload(true);
        }

    });
    </script>

<?= $this->endSection('content'); ?>