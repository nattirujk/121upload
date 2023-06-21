<?= $this->extend('layouts/public_layouts') ?>

<?= $this->section('css') ?>
<style>

</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <hr class="nav-container-divider">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?php if (!empty(validation_errors())) : ?>
                    <div class="col-sm-6 offset-sm-3">
                        <div class="alert alert-danger">
                            <?= validation_list_errors() ?>
                        </div>
                    </div>
                    <?php endif;?>
                    <?= form_open('register') ?>
                    <h4 class="text text-center text-info">ลงทะเบียน</h4>
                    <div class="md-3 col-6">
                        <label for="department_id1" class="form-label">สำนัก</label>
                        <select name="department_id1" class="form-select float-end" id="department_id1"
                            data-placeholder="เลือก">
                            <option></option>
                        </select>
                    </div>
                    <!-- <div class="md-3 col-6">
                        <label for="department_id2" class="form-label">โครงการฯ </label>
                        <select name="department_id2" class="form-select float-end" id="department_id2"
                            data-placeholder="เลือก">
                            <option></option>
                        </select>
                    </div> -->

                    <div class="mb-3 col-6">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="text" class="form-control" name="email" value="<?= set_value('email') ?>">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" name="password" value="<?= set_value('password') ?>">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="passconf" class="form-label">Password Confirm</label>
                        <input type="text" class="form-control" name="passconf" value="<?= set_value('passconf') ?>">
                    </div>
                    <div><input type="submit" value="Submit" class="btn btn-primary"></div>
                    <?= form_close() ?>
                    <p class="text-danger"><span class="text-mute">หมายเหตุ:</span> สามารถสมัครหน่วยงานละ 1 Account ได้เท่านั้น</p>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    $.ajax({
        type: "GET",
        url: "<?= url_to('org_level1') ?>",
        dataType: "JSON",
        success: function(response) {
            response.forEach(element => {
                $("#department_id1").append('<option value="' + element.id + '" >' + element
                    .department + '</option>');
            });
        }
    });
    $('#department_id1').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
    });
    $("#department_id1").on('select2:select', function(e) {
        var id = e.params.data.id
        // console.log(e.params.data.id)
        $.ajax({
            type: "GET",
            url: "/org_level2/" + id,
            dataType: "json",
            success: function(response) {
                $("#department_id2").val(null).trigger('change')
                $("#department_id2 option").remove();
                response.forEach(element => {
                    $("#department_id2").append('<option value="' + element.id +
                        '" >' + element.department + '</option>');
                });
            }
        });
    });
</script>
<?= $this->endSection() ?>
