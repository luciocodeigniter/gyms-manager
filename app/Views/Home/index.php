<?php echo $this->extend('Layout/main'); ?>


<?php echo $this->section('title'); ?>

<?php echo $title ?? ''; ?>

<?php echo $this->endSection(); ?>


<?php echo $this->section('css'); ?>


<?php echo $this->endSection(); ?>


<?php echo $this->section('content'); ?>


<!-- Begin Page Content -->
<div class="container-fluid">


</div>
<!-- /.container-fluid -->


<?php echo $this->endSection(); ?>



<?php echo $this->section('js'); ?>



<?php echo $this->endSection(); ?>