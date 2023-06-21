<style>
    /* ปรับขนาด select box ของ select2 ให้เท่ากับ bootstrap input form-control */
    .select2-selection__rendered {
        line-height: 34px !important;
    }

    .select2-container .select2-selection--single {
        height: 38px !important;
    }

    .select2-selection__arrow {
        height: 36px !important;
    }

    .thumbnail {
  position: relative;
  z-index: 0;
}

.thumbnail:hover {
  background-color: transparent;
  z-index: 50;
}

.thumbnail span {
  /*CSS for enlarged image*/
  position: absolute;
  background-color: lightyellow;
  padding: 5px;
  left: -1000px;
  border: 1px dashed gray;
  visibility: hidden;
  color: black;
  text-decoration: none;
}

.thumbnail span img {
  /*CSS for enlarged image*/
  border-width: 0;
  max-width : 150px;
  padding: 2px;
}

.thumbnail:hover span {
  /*CSS for enlarged image on hover*/
  visibility: visible;
  top: 0;
  left: 60px; /*position where enlarged image should offset horizontally */
}
</style>

<div class="container">
    <?php //echo '<pre>';?>
    <?php //print_r($this->data['uploaded']) ; ?>
    <?php //echo '<pre>';?>
  
    <?php 
        $filename1 = (isset($this->data['uploaded'][1]['shorting'])&& $this->data['uploaded'][1]['shorting'] == 1?  substr($this->data['uploaded'][1]['filename'],20) : "" ) ;  
        $url1 = (isset($this->data['uploaded'][1]['shorting'])&& $this->data['uploaded'][1]['shorting'] == 1? base_url($this->data['uploaded'][1]['filepath'].'/'.$this->data['uploaded'][1]['filename'])  : "" ) ;

        $filename2 = (isset($this->data['uploaded'][2]['shorting'])&& $this->data['uploaded'][2]['shorting'] == 2?  substr($this->data['uploaded'][2]['filename'],20) : "" ) ;  
        $url2 = (isset($this->data['uploaded'][2]['shorting'])&& $this->data['uploaded'][2]['shorting'] == 2? base_url($this->data['uploaded'][2]['filepath'].'/'.$this->data['uploaded'][2]['filename'])  : "" ) ;

        $filename3 = (isset($this->data['uploaded'][3]['shorting'])&& $this->data['uploaded'][3]['shorting'] == 3?  substr($this->data['uploaded'][3]['filename'],20) : "" ) ;  
        $url3 = (isset($this->data['uploaded'][3]['shorting'])&& $this->data['uploaded'][3]['shorting'] == 3? base_url($this->data['uploaded'][3]['filepath'].'/'.$this->data['uploaded'][3]['filename'])  : "" ) ;

        $filename4 = (isset($this->data['uploaded'][4]['shorting'])&& $this->data['uploaded'][4]['shorting'] == 4?  substr($this->data['uploaded'][4]['filename'],20) : "" ) ;  
        $url4 = (isset($this->data['uploaded'][4]['shorting'])&& $this->data['uploaded'][4]['shorting'] == 4? base_url($this->data['uploaded'][4]['filepath'].'/'.$this->data['uploaded'][4]['filename'])  : "" ) ;
    ?>


    <form action="<?= base_url('upload_pic') ?>" method="POST" enctype="multipart/form-data" id="form_upload">
        <input type="hidden" name="id" value="<?php echo (isset($this->data['activity'])?  $this->data['activity']['id'] : "" ) ; ?>">
        <div class="form-group row">
            <p>อัพโหลดภาพกิจกรรม :
                <span class="text-danger">
                    กรุณาอัพโหลดพร้อมกันทั้ง 4 ภาพโดยที่นามสกุลไฟล์เป็นประเภท .jpg/.jpeg/.gif หรือ .png โดยที่ไฟล์มีขนาดได้ไม่เกิน 10 MB และสัดส่วนไดไม่เกิน 1920 x 1080
                </span>
            </p>
        </div>
        <br>
        <div class="form-group row">
            <div class="col-sm-6 offset-sm-3">
                <?php
                if (isset($errors) ? $errors : "" != null) : ?>
                    <div class="alert alert-danger">
                        <?php
                        foreach ($errors->getErrors() as $error) :
                            echo $error . "<br>";
                        endforeach;
                        ?>
                    </div>
                <?php
                endif; ?>
                 <?php
                if (isset($msg)) { ?>
                    <div class="alert alert-danger">
                     <?php echo $msg; ?>
                    </div>
                <?php
                } ?>
                
            </div>
        </div>
        <div class="form-group row">
            <h5 class="text text-info text-center "><?php echo (isset($this->data['department']['department']) ? $this->data['department']['department'] : ""  ) ;?></h5>
            <label class="col-form-label col-sm-1 offset-sm-2 mb-3" for="activity">กิจกรรม:</label>
            <div class="col-sm-6">
                <select class="form-select select2" id="activity" style="width:100%" name="activity">
                    <option value="0">เลือก</option>
                    <option value="1">กิจกรรมที่ 1 การสักการะสิ่งศักดิ์สิทธิ์ และการจัดพิธีสงฆ์</option>
                    <option value="2">กิจกรรมที่ 2 กิจกรรมบริจาคโลหิต</option>
                    <option value="3">กิจกรรมที่ 3 การจัดกิจกรรมแสดงความยินดีจากหน่วยงานต่าง ๆ/การรับบริจาค</option>
                    <option value="4">กิจกรรมที่ 4 พิธีเปิดงาน 121 ปี กรมชลประทาน</option>
                    <option value="5">กิจกรรมที่ 5 กิจกรรมประกาศเกียรติคุณข้าราชการพลเรือนและลูกจ้างประจำดีเด่นกรมชลประทานประจำปี พ.ศ. 2565/กิจกรรมมอบโล่รางวัลการพัฒนาคุณภาพการบริหารจัดการโครงการส่งน้ำและบำรุงรักษา</option>
                    <option value="6">กิจกรรมที่ 6 การบรรยายพิเศษจากวิทยากรผู้มีชื่อเสียง</option>
                    <option value="7">กิจกรรมที่ 7 กิจกรรมอื่น ๆ</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-1 offset-sm-2 mb-3" for="title">หัวข้อ:</label>
            <div class="col-sm-6">
                <input type="text" name="title" id="title" class="form-control" value="<?php echo (isset($this->data['activity'])?  $this->data['activity']['title'] : "" ) ; ?>">
            </div>
        </div>
        <div class="form-group row mb-1">
            <label class="col-form-label col-sm-1 offset-sm-2 mb-3" for="content">รายละเอียด:</label>
            <div class="col-sm-6">
                <textarea name="content" id="content" cols="30" rows="10" class="form-control"><?php echo (isset($this->data['activity'])?  $this->data['activity']['content'] : "" ) ; ?></textarea>
            </div>
        </div>
       
        <div class="form-group row">
            <label class="col-form-label col-sm-1 offset-sm-2 mb-3" for="photo1">ภาพที่ 1:</label>
            <div class="col-sm-6">
                <input type="file" class="form-control" id="photo1" name="photo[1]" accept="image/*">
            </div>
            <span class="col-sm-3 text text-info">
                <a class="thumbnail" href="#thumb"><?= $filename1 ?><span><img src="<?=$url1?>" /><br /><?=$filename1?></span></a><br />
            </span>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-1 offset-sm-2 mb-3" for="photo2">ภาพที่ 2:</label>
            <div class="col-sm-6">
                <input type="file" class="form-control" id="photo2" name="photo[2]" accept="image/*">
            </div>
            <span class="col-sm-3 text text-info">
                <a class="thumbnail" href="#thumb"><?= $filename2 ?><span><img src="<?=$url2?>" /><br /><?=$filename2?></span></a><br />
            </span>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-1 offset-sm-2 mb-3" for="photo3">ภาพที่ 3:</label>
            <div class="col-sm-6">
                <input type="file" class="form-control" id="photo3" name="photo[3]" accept="image/*">
            </div>
            <span class="col-sm-3 text text-info">
                <a class="thumbnail" href="#thumb"><?= $filename3 ?><span><img src="<?=$url3?>" /><br /><?=$filename3?></span></a><br />
            </span>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-sm-1 offset-sm-2 mb-3" for="photo4">ภาพที่ 4:</label>
            <div class="col-sm-6">
                <input type="file" class="form-control" id="photo4" name="photo[4]" accept="image/*">
            </div>
            <span class="col-sm-3 text text-info">
                <a class="thumbnail" href="#thumb"><?= $filename4 ?><span><img src="<?=$url4?>" /><br /><?=$filename4?></span></a><br />
            </span>
        </div>
        <br>
        <div class="row">
            <span class="text-danger">&#42;แนะนำให้เป็นภาพแนวนอน และถ้าต้องการเปลี่ยนรูปภาพให้อัพโหลดทับไฟล์เดิมได้เลย</span>
        </div>
        <div class="row mb-3">
            <div class="col-12 text-center">
                <input type="submit" class="btn btn-primary mx-5" id="upload_btn" value="อัพโหลด" />
                
                <?php if (isset($this->data['activity'])) : ?>
                    <button type="button" class="btn btn-danger" id="btn-delete-activity">ลบกิจกรรมนี้</button>
                <?php endif; ?>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        let result = "<?= isset($result) ? $result : false ?>";

        if (result) {
            Swal.fire({
                title: 'อัพโหลดสำเร็จ',
                icon: 'success',
                confirmButtonText: 'OK',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?php echo base_url('/') ?>";
                }
            });
        } else {

        }
        $("#activity").select2();

        $("#activity").val('<?php echo (isset($_GET['a']) ? $_GET['a'] : '') ;?>');
        $("#activity").trigger('change');

        // get_activity();
    });

    $("#activity").on("select2:select", function (e) {
        var data = e.params.data;
        window.location.href = `<?php echo base_url("uploader");?>` + '?a=' + data.id;

    });
    // function get_activity() {
    //     $.ajax({
    //         url: "<?php echo base_url("get_activity") ?>",
    //         method: "post",
    //         dataType: "json",
    //         success: function(response) {
    //             $("#activity").empty()
    //                 .append('<option selected value="">กรุณาเลือกกิจกรรมที่ต้องการอัพโหลดภาพ</option>');

    //             var data = response;
    //             let option;
    //             for (let i = 0; i < data.length; i++) {
    //                 const id = data[i].id;
    //                 const activity = data[i].activity;
    //                 option = '<option value="' + id + '">' + activity + '</option>';
    //                 $("#activity").append(option);
    //             }
    //         },
    //         error: function(jqXHR, status, errs) {
    //             alert(jqXHR.status + " " + errs);
    //         }
    //     });
    // }

    $("#upload_btn").click(function(e) {
        e.preventDefault();

        let sweetConfig = {
            icon: "question",
            title: "ยืนยันการอัพโหลดใช่หรือไม่",
            text: "<?= session()->get('username') ?>",
            showCancelButton: true,
            cancelButtonText: "ไม่",
            confirmButtonText: "ใช่",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            position: "top",
            reverseButtons: true,
        }

        Swal.fire(sweetConfig).then((result) => {
            if (result.isConfirmed) {
                $("#form_upload").submit();
            }
        });

    });

    $("#btn-delete-activity").on("click", function () {
        let sweetConfig = {
            icon: "question",
            title: "ลบกิจกรรม",
            text: "คุณต้องการลบกิจกรรมนี้ใช่หรือไม่",
            showCancelButton: true,
            cancelButtonText: "ไม่",
            confirmButtonText: "ใช่",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            position: "top",
            reverseButtons: true,
        }
        Swal.fire(sweetConfig).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('/delete'); ?>",
                    data: {"activity_id" : "<?php echo (isset($this->data['activity']) ? $this->data['activity']['id'] : "") ;?>" },
                    dataType: "json",
                    success: function (response) {
                        if (response.status === true ) {
                            location.reload(); 
                        }else {
                            console.log(response)
                        }
                    }
                });

            }
        });
    });
</script>