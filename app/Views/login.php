<style>
    .card {
        background-color: rgba(0,0,0,0);
        border: none;
    }
</style>
<div class="container">
    <hr class="nav-container-divider">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo base_url('/authorize'); ?>" method="post">
                        <div class="form-group">
                            <div class="col-sm-4 offset-sm-4">
                                <?php
                if (session()->get('error') != null) : ?>
                                <div class="alert alert-danger">
                                    <?php
                                    foreach (
                                        session()
                                            ->get('error')
                                            ->getErrors()
                                        as $error
                                    ):
                                        echo $error . '<br>';
                                    endforeach;
                                    ?>
                                </div>
                                <?php
                endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-8 offset-4">
                                <label class="form-label" for="username">กรอกอีเมลที่ท่านลงทะเบียนไว้</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="E-mail" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-8 offset-4">
                                <label class="form-label" for="username">รหัสผ่าน</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" />
                            </div>
                        </div>
                        <br>
                        <div class="text-center col-12">
                            <input type="submit" class="btn btn-primary" value="เข้าสู่ระบบ" />
                            <a href="<?php echo base_url('/'); ?>" role="button" class="btn btn-secondary">ย้อนกลับ</a>
                        </div>
                    </form>
                    <br>
                    <div class="text-center"><a class="text-info" href="<?php echo url_to('register'); ?>">ลงทะเบียน</a></div>
                    
                </div>
            </div>

        </div>
        <div class="col-2"></div>

    </div>
</div>
