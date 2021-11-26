<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Login</title>
        <link rel="shortcut icon" href="<?= base_url() ?>/public/assets/img/iconBagudbud.png" type="image/x-icon">
        <link href="<?= base_url('/public/assets/admin/css/styles.css') ?>" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body d-flex flex-column">
                                        <span class="err-handler d-none alert alert-danger text-center"></span>
                                        <form method="POST" id="admin-form">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" required type="text" name="username" placeholder="abc223" />
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" required name="password" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary w-100 py-3">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Bagudbud Express 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('/public/assets/admin/js/scripts.js') ?>"></script>

        <script>
            $(() => {
                $('#admin-form').submit(function(event) {
                    event.preventDefault();
                    // prevent from entering
                    if ($('input[type=password]').val().length < 16) {
                        $('.err-handler').removeClass('d-none');
                        $('.err-handler').text("Password must be atleast 16 characters");
                        return;
                    }

                    $.ajax({
                        url: "<?= base_url('Admin/adminLogin'); ?>",
                        method: "POST",
                        dataType: "json",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (res) {
                            if (res.status_code === 404) {
                                $('.err-handler').removeClass('d-none');
                                $('.err-handler').text(res.message)
                            } else {
                                $('.err-handler').addClass('d-none');
                                let getUrl = window.location;
                                let baseUrl = `${getUrl.origin}/${getUrl.pathname.split('/')[1]}`;
                                let currentUrl = getUrl.pathname.split('/')[2];
                                location.href = `${baseUrl}/${currentUrl}`;
                            }
                        }
                    });
                });
            })
        </script>
    </body>
</html>
