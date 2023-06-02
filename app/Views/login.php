<div class="container">
    <form action="<?php echo base_url('/authorize') ?>" method="post">
        <div class="form-group">
            <div class="col-sm-4 offset-sm-4">
                <?php
                if (session()->get('error') != null) : ?>
                    <div class="alert alert-danger">
                        <?php
                        foreach (session()->get('error')->getErrors() as $error) :
                            echo $error . "<br>";
                        endforeach;
                        ?>
                    </div>
                <?php
                endif; ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-4 offset-4">
                <label class="form-label" for="username">กรอกอีเมลที่ท่านลงทะเบียนไว้</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="E-mail" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-4 offset-4">
                <label class="form-label" for="username">รหัสผ่าน</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
            </div>
        </div>
        <br>
        <div class="text-center">
            <input type="submit" class="btn btn-primary" value="เข้าสู่ระบบ" />
            <a href="<?php echo base_url('/') ?>" role="button" class="btn btn-secondary">ย้อนกลับ</a>
        </div>
    </form>
</div>