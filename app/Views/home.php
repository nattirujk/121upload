<?= $this->extend('layouts\public_layouts') ?>

<?= $this->section('css') ?>
    <style>
  
        .page-a4 {
            width: 21cm;
            height: 29.7cm;
            padding: 0.2cm;
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        }

        @media print {

            body,
            page {
                margin: 0;
                box-shadow: 0;
            }

        }

        @media print {
            .pagebreak {
                page-break-before: always;
            }

            /* page-break-after works, as well */
            @page {
                margin-top: 0;
                margin-bottom: 0;
            }

            body {
                padding-top: 10px;
                padding-bottom: 10px;
            }
        }

        .head_orgname {
            position: relative;
            float: left;
            text-align: right;
            margin-top: 1cm;
            margin-left: 2.5cm;

        }

        .head_orgname>h2 {
            color: #0284C7;
        }

        .head_orgname>h6 {
            color: #0EA5E9;
        }

        .head_image {
            position: relative;
            float: right;
            margin-right: 0.5cm;
            margin-top: 1cm;
        }

        .head_image img {
            width: 8em;
        }

        .col-12-a4 {
            background: #FFFFFF;
            border: 1px solid #0284C7;
            box-shadow: 0px 10px 4px rgba(125, 217, 237, 0.28);
            border-radius: 5px;

            flex: auto;
            margin-right: 1cm;
            margin-left: 2.5cm;
            margin-bottom: 0.3cm;
            opacity: 0.8;
        }

        div[id] {
            page-break-before: always;
        }

        .img-thumbnail {
            max-height: 350px;
        }
    </style>
    <?= $this->endSection() ?>
    
<?= $this->section('content') ?>
    <div class="container">
        <!-- START THE FEATURETTES -->
        <hr class="featurette-divider">
        <div class="row">
            <div class="col-md-12">
                <form action="<?= url_to('show') ?>" method="GET" name="frm_select_org" id="frm_select_org" class="row justify-content-end">
                    <div class="col-3"></div>
                    <div class="col-4">
                        <select name="organize_id" class="form-select float-end" id="organize_id" data-placeholder="เลือก">
                            <option></option>
                        </select>
                    </div>
                    <div class="col-4">
                        <select name="organize_pid" id="organize_pid" class="form-select float-end"
                            data-placeholder="เลือก">
                            <option></option>
                        </select>
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn btn-primary float-end"> เลือก</button>
                    </div>
                </form>

            </div>
            <div class="col-md-12 d-flex justify-content-end">
                <div class="form-check form-switch p-2 m-2">
                    <input class="form-check-input" type="checkbox" id="sw-a4">
                    <label class="form-check-label" for="sw-a4">A4</label>
                </div>
                <button type="button" class="btn btn-info p-2 m-2" onclick="printDiv('printableArea')"><i class="icon-print"></i> ปริ้น</button>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <?php if (isset($org)) : ?>
                    <?php foreach ($org['activity'] as $key => $value) : ?>
                    <page size="A4" class="printableArea">
                        <div class="row">
                            <div class="col-md-12 mb-0">
                                <div class="head_orgname">
                                    <?php //echo var_dump((isset($this->data) ? $this->data :""))  ?>
                                    <h2 class="text text-info"><?php if($org_root) : echo $org_root['department'] ?> 
                                    <?php elseif (empty($org_root)): echo  $org['department'] ?>
                                    <?php endif;?> </h2>
                                    <h6 class="text text-info">
                                    <?php if($org_root) : echo $org['department'] ?> 
                                    <?php endif;?>
                                    </h6>
                                </div>
                                <div class="head_image">
                                    <img src="<?= base_url('/assets/121-year-200px.png') ?>" alt="" srcset="">
                                </div>
                            </div>
                            <div class="col-md-12 m-0">
                                <hr>
                            </div>
                            <div class="col-md-12 col-12-a4">
                                <h4 class="text text-primary text-center mt-2" ><b><?php echo $value['title'] ;?></b></h4>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row m-1">
                                            <?php foreach ($value['photo'] as $key => $photo) : ?>
                                                
                                                <div class="col-6">
                                                    <img class="img-fluid img-thumbnail"
                                                        src="<?php echo base_url( $photo['filepath'].'/'.$photo['filename']) ; ?>"
                                                        alt="">
                                                    </div>
                                                
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                   
                                    <div class="col-12"><p style="word-wrap: anywhere;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $value['content'] ;?></p></div>
                                </div>
                            </div>
                        </div>
                        <div class="pagebreak"> </div>
                    </page>
                    <?php endforeach; ?>

                <?php endif;?>
            </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->


<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
    <script>
        $.ajax({
            type: "GET",
            url: "<?= url_to('org_level1')?>",
            dataType: "JSON",
            success: function(response) {
                response.forEach(element => {
                    $("#organize_id").append('<option value="' + element.id + '" >' + element
                        .department + '</option>');
                });
            }
        });
        $('#organize_id').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        });

        $("#organize_id").on('select2:select', function(e) {
            var id = e.params.data.id
            // console.log(e.params.data.id)
            $.ajax({
                type: "GET",
                url: "/org_level2/"+id,
                dataType: "json",
                success: function(response) {
                    $("#organize_pid").val(null).trigger('change')
                    $("#organize_pid option").remove();
                    response.forEach(element => {
                        $("#organize_pid").append('<option value="' + element.id +
                            '" >' + element.department + '</option>');
                    });
                }
            });
        });

        $('#organize_pid').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
        });

        function printDiv(divName) {
            // var printContents = document.getElementById(divName).innerHTML;
            // var printContents = document.getElementsByClassName(divName)[1].innerHTML;
            var classAll = document.getElementsByClassName(divName);
            var printContents = '';
            Array.prototype.forEach.call(classAll, function(el) {
                printContents += el.innerHTML
            })
            // console.log(contents)
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();
            location.reload();
            // document.body.innerHTML = originalContents;

        }
        $("#sw-a4").prop('checked', false)
        $("#sw-a4").on("change", function() {
            // console.log($("#sw-a4").prop('checked'))
            if ($("#sw-a4").prop('checked') == true) {
                $(".printableArea").addClass("page-a4")
            } else {
                $(".printableArea").removeClass("page-a4")
            }
        }).trigger("change");
    </script>
    <?= $this->endSection() ?>