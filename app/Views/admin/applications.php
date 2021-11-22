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
                        <h1 class="mt-4">Applications</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?= base_url('/admin') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">applications</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Applications Table
                            </div>
                            <div class="card-body mt-3">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Vehicle Type</th>
                                            <th>Date Applied</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Vehicle Type</th>
                                            <th>Date Applied</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            if (isset($data['data'])) {
                                            
                                            foreach($data['data'] as $row) { 
        
                                            $date = date_create($row['apply_Date']);
                                            $xdate = date_format($date, "F j, Y, g:i a");   

                                        ?>
                                        <tr>
                                            <td><?= $row['delP_ID'] ?></td>
                                            <td><?= $row['delP_fName'] . " " . $row['delP_lName'] ?></td>
                                            <td><?= $row['delP_Email'] ?></td>
                                            <td><?= $row['vehicle_Type'] ?></td>
                                            <td><?= $xdate ?></td>
                                            <td>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <button class="hire-now btn btn-primary me-2"><i class="bi bi-person-plus"></i></button>
                                                    <button class="delete-item btn btn-danger"><i class="bi bi-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php }} ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
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
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    $(() => {
                        $('table').click( e => {
                            if (e.target.classList.contains('hire-now') || e.target.parentElement.classList.contains('hire-now')) {
                                let self = e.target.tagName === "I" ? e.target.parentElement : e.target;
                                let nodelist = self.parentElement.parentElement.parentElement.children;
                                self.innerHTML = "";
                                self.innerHTML = '<i class="bi bi-person-check"></i>';
                                self.classList.remove('btn-primary');
                                self.classList.add('btn-success');

                                $.ajax({
                                    type: "post",
                                    url: "<?= base_url('Admin/setPersonnelStatus')?>",
                                    data: {
                                        cid: nodelist[0].textContent,
                                        email: nodelist[2].textContent
                                    },
                                    dataType: "json",
                                    success: function (res) {
                                        if(res.code == 202){
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
                                            })
                                        }else{
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
                                                title: 'Error Hiring!'
                                            })
                                        }
                                    }
                                });
                                
                            } else if (e.target.classList.contains('delete-item') || e.target.parentElement.classList.contains('delete-item')) {
                                let self = e.target.tagName === "I" ? e.target.parentElement : e.target;
                                let nodelist = self.parentElement.parentElement.parentElement.children;

                                document.querySelector('.cancel-container').classList.add('popup-active');
                                document.querySelector('body').classList.add('popup-blur-active');

                                $('.cancel-container').submit(function(event) {
                                    event.preventDefault();
                                    let msg = $('textarea').text();
                                    $.ajax({
                                        type: "post",
                                        url: "<?= base_url('Admin/deletePersonnel')?>",
                                        data: {
                                            cid: nodelist[0].textContent,
                                            msg,
                                            email: nodelist[2].textContent
                                        },
                                        dataType: "json",
                                        success: function (res) {
                                            if(res.code == 202){
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
                                                }).then(() => {
                                                    location.reload()
                                                })
                                            }else{
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
                                                    title: 'Error Hiring!'
                                                })
                                            }
                                        }
                                    });
                                })
                            }
                        });

                        
                    })
                </script>
    <?= $this->endSection(); ?>