<?php echo $this->extend('Layout/main'); ?>


<?php echo $this->section('title'); ?>

<?php echo $title ?? ''; ?>

<?php echo $this->endSection(); ?>



<?php echo $this->section('css'); ?>


<!-- Custom styles for this page -->
<link href="<?php echo base_url(); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


<?php echo $this->endSection(); ?>


<?php echo $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6>
            <a href="<?php echo route_to('gyms.new'); ?>" class="btn btn-success btn-sm float-right">Nova</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <?php echo $gyms; ?>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<?php echo $this->endSection(); ?>



<?php echo $this->section('js'); ?>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>js/demo/datatables-demo.js"></script>


<?php echo $this->endSection(); ?>