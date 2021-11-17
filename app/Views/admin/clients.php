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
                                                    <button class="btn btn-primary me-2"><i class="bi bi-chat-dots"></i></i></button>
                                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <script>
                    $(() => {
                    })
                </script>
    <?= $this->endSection(); ?>