<!-- 
	Extends the base.php that has the header and footer 
-->
<?= $this->extend('layouts/base.php') ?> 

<!-- 
	Inserts the whole section to the base.php
 -->
<?= $this->section('content'); ?>
<br>
<br>
	<h1 class="text-muted">Home php</h1>
<?= $this->endSection(); ?>