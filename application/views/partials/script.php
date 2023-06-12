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
		document.getElementById("periode").addEventListener("change", function() {
			var periodeValue = this.value;
			var year = periodeValue.split("-")[0];
			var month = periodeValue.split("-")[1];

			var tglawalInput = document.getElementById("tglawal");
			var tglakhirInput = document.getElementById("tglakhir");

			var tglawal = new Date(year, month - 2, 29);
			var tglakhir = new Date(year, month - 1, 28);

			tglawalInput.value = formatDate(tglawal);
			tglakhirInput.value = formatDate(tglakhir);
		});

		function formatDate(date) {
			var year = date.getFullYear();
			var month = (date.getMonth() + 1).toString().padStart(2, "0");
			var day = date.getDate().toString().padStart(2, "0");
			return year + "-" + month + "-" + day;
		}
	</script>

	<script>
		function showMonthYearPicker(inputId) {
		const input = document.getElementById(inputId);
		const currentDate = new Date();
		
		// Menggunakan library datepicker.js untuk menampilkan date picker
		const picker = new Pikaday({
			field: input,
			format: 'MMM YYYY', // Format bulan dan tahun (Misal: Jan 2023)
			yearRange: [1900, currentDate.getFullYear()], // Rentang tahun dari 1900 hingga tahun sekarang
			onSelect: function(date) {
			input.value = moment(date).format('MMM YYYY'); // Menggunakan library moment.js untuk memformat tanggal
			}
		});
		}

		// Panggil fungsi showMonthYearPicker dengan ID input yang diinginkan
		showMonthYearPicker('bulanTahun');
	</script>
	<script>
		const inputTglAwal = document.getElementById("tglawal");
		const inputTglAkhir = document.getElementById("tglakhir");
		const inputPeriode = document.getElementById("periode");

		inputTglAwal.addEventListener("change", function() {
			const tglAwal = new Date(inputTglAwal.value);
			const tglAkhir = new Date(inputTglAkhir.value);
			const periodeValue = inputPeriode.value;
			const year = periodeValue.split("-")[0];
			const month = periodeValue.split("-")[1];
			const startDate = new Date(year, month - 2, 29);
			const endDate = new Date(year, month - 1, 28);

			if (tglAwal < startDate || tglAwal > endDate) {
				alert("Tanggal yang dipilih berada di luar periode yang dipilih.");
				inputTglAwal.value = formatDate(startDate);
			}

			if (tglAwal > tglAkhir) {
				alert("Tanggal awal tidak boleh melebihi tanggal akhir.");
				inputTglAwal.value = formatDate(tglAkhir);
			}
		});

		inputTglAkhir.addEventListener("change", function() {
			const tglAwal = new Date(inputTglAwal.value);
			const tglAkhir = new Date(inputTglAkhir.value);
			const tanggalSekarang = new Date();
			const periodeValue = inputPeriode.value;
			const year = periodeValue.split("-")[0];
			const month = periodeValue.split("-")[1];
			const startDate = new Date(year, month - 2, 29);
			const endDate = new Date(year, month - 1, 28);

			if (tglAkhir < startDate || tglAkhir > endDate) {
				alert("Tanggal yang dipilih berada di luar periode yang dipilih.");
				inputTglAkhir.value = formatDate(endDate);
			}else if (tglAkhir > tanggalSekarang) {
				alert("Tanggal akhir tidak valid. Silakan masukkan tanggal yang tidak melebihi tanggal sekarang.");
				inputTglAkhir.value = formatDate(tanggalSekarang);
			} else if (tglAkhir < tglAwal) {
				alert("Tanggal akhir tidak boleh kurang dari tanggal awal.");
				inputTglAkhir.value = formatDate(tglAwal);
			}
		});

		inputPeriode.addEventListener("change", function() {
			const periodeValue = inputPeriode.value;
			const year = periodeValue.split("-")[0];
			const month = periodeValue.split("-")[1];
			const startDate = new Date(year, month - 2, 29);
			const endDate = new Date(year, month - 1, 28);

			inputTglAwal.value = formatDate(startDate);
			inputTglAkhir.value = formatDate(endDate);
		});

		function formatDate(date) {
			const year = date.getFullYear();
			const month = (date.getMonth() + 1).toString().padStart(2, "0");
			const day = date.getDate().toString().padStart(2, "0");
			return year + "-" + month + "-" + day;
		}
	</script>

	<script>
		// Fungsi untuk mengatur zoom browser menjadi 80%
		function setBrowserZoom() {
			document.body.style.zoom = "85%"; // Mengatur zoom ke 80%
		}

		// Panggil fungsi setBrowserZoom setelah halaman selesai dimuat
		window.onload = setBrowserZoom;
	</script>
