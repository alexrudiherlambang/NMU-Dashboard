    <!--begin::Javascript-->
    <script>var hostUrl = "<?php echo base_url(); ?>assets/";</script>
	<!--begin::Global Javascript Bundle(mandatory for all pages)-->
	<script src="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Vendors Javascript(used for this page only)-->
	<script src="<?php echo base_url(); ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
	<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
	<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
	<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
	<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
	<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
	<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
	<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
	<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
	<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
	<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
	<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/custom/apps/user-management/users/list/table.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/custom/apps/user-management/users/list/add.js"></script>
	<!--end::Vendors Javascript-->
	<!--begin::Custom Javascript(used for this page only)-->
	<script src="<?php echo base_url(); ?>assets/js/widgets.bundle.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/custom/widgets.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/custom/apps/chat/chat.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/custom/utilities/modals/upgrade-plan.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/custom/utilities/modals/create-app.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/custom/utilities/modals/new-target.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/custom/utilities/modals/users-search.js"></script>
	
	<!--end::Custom Javascript-->
	<!--end::Javascript-->
	<script>
    const inputTglAwal = document.getElementById("tglawal");
    const inputTglAkhir = document.getElementById("tglakhir");

    inputTglAwal.addEventListener("change", function() {
        const tglAwal = new Date(inputTglAwal.value);
        const tglAkhir = new Date(inputTglAkhir.value);

        if (tglAwal > tglAkhir) {
        alert("Tanggal awal tidak boleh melebihi tanggal akhir");
        inputTglAwal.value = "";
        }
    });

    inputTglAkhir.addEventListener("change", function() {
        const tglAwal = new Date(inputTglAwal.value);
        const tglAkhir = new Date(inputTglAkhir.value);

        const tanggalSekarang = new Date();
        if (tglAkhir > tanggalSekarang) {
        alert("Tanggal akhir tidak valid. Silakan masukkan tanggal yang tidak melebihi tanggal sekarang.");
        inputTglAkhir.value = "";
        } else if (tglAkhir < tglAwal) {
        alert("Tanggal akhir tidak boleh kurang dari tanggal awal");
        inputTglAkhir.value = "";
        }
    });
    </script>