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
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Shop Name</th>
                                            <th>Date of Birth</th>
                                            <th>Date Approved</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Shop Name</th>
                                            <th>Date of Birth</th>
                                            <th>Date Approved</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>21</td>
                                            <td>Edinburgh</td>
                                            <td>2011/04/25</td>
                                            <td>2011/04/25</td>
                                            <td>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <button class="message-item btn btn-primary me-2"><i class="bi bi-chat-dots"></i></i></button>
                                                    <button class="delete-item btn btn-danger"><i class="bi bi-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        
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
                                                    <textarea class="form-control fw-lighter border-1 border-dark" placeholder="" required id="floatingTextarea2" style="height: 10rem"></textarea>
                                                    
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
                <script>
                    $(() => {
                    })
                </script>
    <?= $this->endSection(); ?>