<?= $this->extend('layouts/public_layouts') ?>

<?= $this->section('css') ?>

<?= $this->endSection() ?>
    
<?= $this->section('content') ?>
    <div class="container">
        <!-- START THE FEATURETTES -->
        <hr class="head-divider">

        <div class="row mt-5">
            <div class="col-md-12">
              <h3 class="text-info">หน่วยงานที่ เพิ่มภาพกิจกรรม</h3>
              <ul>
                <?php foreach ($this->data as $key => $value) : ?>
                <li><a href="<?= base_url('/show?organize_id='.$value->dp) ?>"> <?php echo $value->department ;?></a></li>
                <?php endforeach; ?>
            </ul> 
            </div>
        </div>
        <hr class="featurette-divider">
        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->


<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
   
<?= $this->endSection() ?>