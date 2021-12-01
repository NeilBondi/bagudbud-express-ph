<!-- 
	Extends the base_no_nav.php that has the header and footer 
-->
<?= $this->extend('admin/layouts.php') ?>

<!-- 
	Inserts the whole section to the base_no_nav.php
 -->
<?= $this->section('content'); ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Clients</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('/admin') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Clients</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Clients Table
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Client ID</th>
                                <th>Client Name</th>
                                <th>Shop Name</th>
                                <th>Product Type</th>
                                <th>Municipality</th>
                                <th>Status</th>
                                <th>Total Requests</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Client ID</th>
                                <th>Client Name</th>
                                <th>Shop Name</th>
                                <th>Product Type</th>
                                <th>Municipality</th>
                                <th>Status</th>
                                <th>Total Requests</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            foreach ($logdata as $row) {

                                if ($row['Verified'] == 1) {
                                    $status = 'verified/active';
                                } else {
                                    $status = 'Not verified';
                                }
                            ?>
                                <tr id="<?= $row['Client_id']; ?>">
                                    <td><?= $row['Client_id']; ?></th>
                                    <td><?= $row['Name'] . ' ' . $row['L_name'];; ?></th>
                                    <td><?= $row['B_name']; ?></td>
                                    <td><?= $row['Product_type']; ?></td>
                                    <td><?= $row['Municipality']; ?></th>
                                    <td><?= $status; ?></td>
                                    <td><?= $row['requestrecord']; ?></th>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button class="message-item btn btn-primary me-2" id="<?= $row['Client_id']; ?>"><i class="bi bi-chat-dots"></i></i></button>
                                            <button class="delete-btn btn btn-danger" id="<?= $row['Client_id']; ?>"><i class="bi bi-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="message-container container-fluid position-absolute top-50 start-50 translate-middle justify-content-center row">
            <div class="card" style="max-width: 40rem; width: 100%;">
                <div class="card-body">
                    <form method="post" class="" id="notify-form">
                        <div class="d-inline-flex">
                            <h6 class="card-title position-relative text-black">Notify</h5>
                        </div>
                        <div class="row">

                            <!-- reason text area -->

                            <div class="col">
                                <div class="mb-4 d-flex flex-column">
                                    <div class="position-relative">
                                        <textarea id="mssg" class="form-control fw-lighter border-1 border-dark" placeholder="" required id="floatingTextarea2" style="height: 10rem"></textarea>

                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <!-- Submit btn -->

                                <!-- <button type="submit" class="btn btn-primary">Add</button> -->
                                <input type="submit" class="btn btn-success w-100 py-2" value="Send">
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(() => {
            $('.message-item').click(function(e) {
                e.preventDefault();
                var cid = $(this).attr("id");

                $('#notify-form').submit(function(e) {
                    e.preventDefault();
                    var mssg = $('#mssg').val();

                    $.ajax({
                        type: "post",
                        url: "<?= base_url('Admin/notifyClient') ?>",
                        data: {
                            cid: cid,
                            mssg: mssg
                        },
                        dataType: "json",
                        success: function(res) {
                            if (res.code == 202) {
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
                                    title: res.msg
                                }).then(function() {
                                    $('#notify-form').trigger("reset");
                                });
                            } else {
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
                                    icon: 'error',
                                    title: 'Message not sent'
                                })
                            }
                        }
                    });
                });

            });

            $('.delete-btn').click(function(e) {
                e.preventDefault();
                var cid = $(this).attr("id");

                $.ajax({
                    type: "post",
                    url: "<?= base_url('Admin/deleteClient') ?>",
                    data: {
                        cid: cid
                    },
                    dataType: "json",
                    success: function(res) {
                        if (res.code == 202) {
                            $('#' + cid + '').fadeOut('slow');
                        }
                    }
                });
            });

        })
    </script>
    <?= $this->endSection(); ?>