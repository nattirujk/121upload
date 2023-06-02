<footer>
    <div class="text-center" style="color: white;background-color: #171717;border: 1px outset #000010;">
        <!-- <span>Page rendered in {elapsed_time} seconds</span> -->
        <span>สงวนลิขสิทธิ์ &copy; <?= date('Y') + 543 ?> กรมชลประทาน</span>
    </div>
</footer>
<!-- custom js -->

<script src="<?=base_url('/assets/js/bootstrap.bundle.min.js')?>" ></script>
<script src="<?=base_url('/assets/js/sweetalert2.all.min.js')?>"></script>
<script src="<?=base_url('/assets/js/select2.min.js')?>"></script>
<script>
    // logout script
    function logout() {

        let sweetConfig = {
            icon: "question",
            title: "ต้องการออกจากระบบหรือไม่?",
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
                window.location.href = "<?= base_url('logout') ?>";
            }
        });
    }
</script>
</body>

</html>