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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row d-flex justify-content-center">
                            <div class="col-6 col-lg-3">
                                <div class="card card-button pending-btn">
                                    <div class="card-body px-4 px-md-3 py-4">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="bi bi-person-video3 d-flex justify-content-center align-items-center"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">No. of Clients</h6>

                                                <!-- Insert Pending Count -->

                                                <h5 class="font-extrabold mb-0 text-black"><span id="numPending">1</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="card card-button active-deliveries-btn">
                                    <div class="card-body px-4 px-md-3 py-4">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="bi bi-people d-flex justify-content-center align-items-center"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">No. of Applications</h6>

                                                <!-- Insert Active Deliveries Count -->

                                                <h5 class="font-extrabold mb-0 text-black"><span id="numAccepted">1</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="card card-button pending-btn">
                                    <div class="card-body px-4 px-md-3 py-4">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="bi bi-clipboard-data d-flex justify-content-center align-items-center"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">No. of Requests</h6>

                                                <!-- Insert Pending Count -->

                                                <h5 class="font-extrabold mb-0 text-black"><span id="numPending">1</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="card card-button active-deliveries-btn">
                                    <div class="card-body px-4 px-md-3 py-4">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="bi bi-check2-square  d-flex justify-content-center align-items-center"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">No. of Successful Deliveries</h6>

                                                <!-- Insert Active Deliveries Count -->

                                                <h5 class="font-extrabold mb-0 text-black"><span id="numAccepted">1</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Requests
                            </div>
                            <div class="card-body mt-3">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Tracking ID</th>
                                            <th>Client Name</th>
                                            <th>Municipality</th>
                                            <th>Status</th>
                                            <th>Date Reqiested</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tracking ID</th>
                                            <th>Client Name</th>
                                            <th>Municipality</th>
                                            <th>Status</th>
                                            <th>Date Reqiested</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            foreach($logdata as $row){

                                                $date = date_create($row['req_date']);
                                                $xdate = date_format($date, "F j, Y, g:i a");
                                        ?>
                                        <tr id="<?= $row['req_id'];?>">
                                            <td><?= $row['tracking_id'];?></td>
                                            <td><?= $row['recepient_name'];?></td>
                                            <td><?= $row['recepient_municipality'];?></td>
                                            <td><?= $row['status'];?></td>
                                            <td><?= $xdate?></td>
                                            <td>
                                                <div class="delete-item d-flex justify-content-center align-items-center">
                                                    <button data="<?= $row['Client_id'];?>" class="delete-item btn btn-danger delete" id="<?= $row['req_id'];?>"><i class="bi bi-trash"></i></button>
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
                </main>
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
                <div class="cancel-container container-fluid position-absolute top-50 start-50 translate-middle justify-content-center row">
                    <div class="card" style="max-width: 40rem; width: 100%;">
                        <div class="card-body">
                            <form method="post" class="" id="delete-form">
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
        </div>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function () {
                $('.delete').click(function (e) { 
                    e.preventDefault();
                    var req_id = $(this).attr("id");
                    var cid = $(this).attr("data");
                    
                    $('#delete-form').submit(function (e) { 
                        e.preventDefault();
                        var mssg = $('#floatingTextarea2').val();
                        
                        $.ajax({
                            type: "post",
                            url: "<?= base_url('Admin/notifyClient')?>",
                            data: {
                                cid:cid,
                                mssg: mssg
                            },
                            dataType: "json",
                            success: function (res) {
                                if(res.code == 202){
                                    $.ajax({
                                        type: "post",
                                        url: "<?= base_url('Admin/deleteRequest')?>",
                                        data: {
                                            req_id:req_id
                                        },
                                        dataType: "json",
                                        success: function (resdata) {
                                            if(resdata.code == 202){
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
                                                title: 'Deleted'
                                                }).then(function(){
                                                    $('#detele-form').trigger("reset");
                                                    $('#' + req_id + '').fadeOut('slow');
                                                })
                                            }else{
                                                alert('cant delete this request')
                                            }
                                            
                                        }
                                    });
                                }
                            }
                        });
                    });
                });
            });
        </script>
        
<?= $this->endSection(); ?>