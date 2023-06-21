<?= $this->extend('layouts/public_layouts') ?>

<?= $this->section('css') ?>

<?= $this->endSection() ?>
    
<?= $this->section('content') ?>
    <div class="container">
        <!-- START THE FEATURETTES -->
        <hr class="head-divider">

        <div class="row mt-5">
            <div class="col-md-12">
              <h3 class="text-info">คู่มือการใช้งาน</h3>
              <img src="<?=base_url('/assets/manual/page1.jpg') ?>" alt="" style="width:800px;height:auto;" class="img-fluid img-thumbnail">
              <img src="<?=base_url('/assets/manual/page2.jpg') ?>" alt="" style="width:800px;height:auto;" class="img-fluid img-thumbnail">
              <img src="<?=base_url('/assets/manual/page3.jpg') ?>" alt="" style="width:800px;height:auto;" class="img-fluid img-thumbnail">
              <img src="<?=base_url('/assets/manual/page4.jpg') ?>" alt="" style="width:800px;height:auto;" class="img-fluid img-thumbnail">
            </div>
        </div>
        <hr class="featurette-divider">
        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->


<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
   
<?= $this->endSection() ?>