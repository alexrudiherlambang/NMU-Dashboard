<!DOCTYPE html>
<html lang="en">

<?php
    $this->load->view('partials/head');
?>

<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
	data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
	data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
	data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
	
	<!--begin::App-->
	<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
		<!--begin::Page-->
		<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <?php
                $this->load->view('partials/header');
            ?>
			<!--begin::Wrapper-->
			<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <?php
                    $this->load->view('partials/sidebar_unit');
                ?>
				<!--begin::Main-->
				<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
					<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
						<!--begin::Toolbar container-->
						<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
							<!--begin::Title-->
							<marquee><h1>
								This Page Is Under Construction !!!</h1></marquee>
							<!--end::Title-->
						</div>
						<!--end::Toolbar container-->
					</div>
					<div style="display: flex; justify-content: center;">
						<img src="<?php echo base_url(); ?>assets/media/auth/404-error.png">
					</div>
					<?php
                        $this->load->view('partials/footer');
                    ?>
				</div>
				<!--end:::Main-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::App-->
	
	
	<?php
        $this->load->view('partials/scroltop');
    ?>
	<!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <!--begin::Close-->
					<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
						<span class="svg-icon svg-icon-1">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
									transform="rotate(-45 6 17.3137)" fill="currentColor" />
								<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
									fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</div>
					<!--end::Close-->
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="<?php echo base_url("clogin/logout") ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
	<?php
        $this->load->view('partials/script');
    ?>
	<!-- Show hide grafik Pendapatan -->
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
	<script>
		$(document).ready(function(){
			$("#card_pendapatan").hide(); // menyembunyikan grafik secara default
			$("#show").click(function(){
				$("#card_pendapatan").show(); // menampilkan grafik saat tombol "show" diklik
				$(this).hide(); // menyembunyikan tombol "show"
				$("#hide").show(); // menampilkan tombol "hide"
			});
			$("#hide").click(function(){
				$("#card_pendapatan").hide(); // menyembunyikan grafik saat tombol "hide" diklik
				$(this).hide(); // menyembunyikan tombol "hide"
				$("#show").show(); // menampilkan tombol "show"
			});
		});
	</script>

	<!-- Show hide grafik Laba Rugi -->
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
	<script>
		$(document).ready(function(){
			$("#card_labarugi").hide(); // menyembunyikan grafik secara default
			$("#show1").click(function(){
				$("#card_labarugi").show(); // menampilkan grafik saat tombol "show" diklik
				$(this).hide(); // menyembunyikan tombol "show"
				$("#hide1").show(); // menampilkan tombol "hide"
			});
			$("#hide1").click(function(){
				$("#card_labarugi").hide(); // menyembunyikan grafik saat tombol "hide" diklik
				$(this).hide(); // menyembunyikan tombol "hide"
				$("#show1").show(); // menampilkan tombol "show"
			});
		});
	</script>

	<!-- Show hide grafik Biaya -->
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
	<script>
		$(document).ready(function(){
			$("#card_beban").hide(); // menyembunyikan grafik secara default
			$("#show2").click(function(){
				$("#card_beban").show(); // menampilkan grafik saat tombol "show" diklik
				$(this).hide(); // menyembunyikan tombol "show"
				$("#hide2").show(); // menampilkan tombol "hide"
			});
			$("#hide2").click(function(){
				$("#card_beban").hide(); // menyembunyikan grafik saat tombol "hide" diklik
				$(this).hide(); // menyembunyikan tombol "hide"
				$("#show2").show(); // menampilkan tombol "show"
			});
		});
	</script>

	<!-- Show hide grafik Kunjungan -->
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
	<script>
		$(document).ready(function(){
			$("#card_kunjungan").hide(); // menyembunyikan grafik secara default
			$("#show3").click(function(){
				$("#card_kunjungan").show(); // menampilkan grafik saat tombol "show" diklik
				$(this).hide(); // menyembunyikan tombol "show"
				$("#hide3").show(); // menampilkan tombol "hide"
			});
			$("#hide3").click(function(){
				$("#card_kunjungan").hide(); // menyembunyikan grafik saat tombol "hide" diklik
				$(this).hide(); // menyembunyikan tombol "hide"
				$("#show3").show(); // menampilkan tombol "show"
			});
		});
	</script>
	
	<!-- Isi Grafik Pendapatan -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script> -->
	<script>
		$(document).ready(function(){
			$.ajax({
			url: '<?php echo site_url('SuperUser/Home/pendapatan') ?>',
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				var ctx = document.getElementById('pendapatan').getContext('2d');
				var pendapatan = new Chart(ctx, {
					type: 'bar',
					data: {
						// labels: ['KP', 'RSG', 'RST', 'RSP', 'RSMU', 'URJ'],
						datasets: [{
							label: 'Revenue',
							data: data.realisasi,
							backgroundColor: 'rgba(0, 0, 128, 0.2)',
							borderColor: 'rgba(0, 0, 128, 1)',
							borderWidth: 2
						}, {
							label: 'Potensi',
							data: data.potensi,
							backgroundColor: 'rgba(255, 99, 132, 0.5)',
							borderColor: 'rgba(255, 0, 0, 1)',
							borderWidth: 2
						}, {
							label: 'Target',
							data: data.target,
							type: 'line',  // tipe dataset menjadi line
							fill: false,  // isi area di bawah garis target dinonaktifkan
							backgroundColor: 'rgba(50, 205, 50, 0.2)',
							borderColor: 'rgba(50, 205, 50, 1)',
							borderWidth: 3,
							tension: 0.4 // nilai kekencangan kurva pada titik data
						}]
					},
					options: {
						scales: {
							x: {
							grid: {
								display: false
							}
							},
							y: {
							grid: {
								display: false
							},
							ticks: {
								callback: function(value, index, values) {
								return 'Rp. ' + (value / 1000000).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0});
								}
							}
							}
						},
						plugins: {
							legend: {
							position: 'bottom'
							},
							tooltip: {
								callbacks: {
									label: function(context) {
										var label = context.dataset.label || '';
										if (label) {
										label += ': ';
										}
										label += 'Rp. ' + (context.parsed.y / 1000000).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0}) + ' ( jt )';
										return label;
									}
								}
							}
						},
						responsive: true
					}
				});
			},
			error: function(xhr, status, error) {
				// Tangani kesalahan jika terjadi
				console.log('Error: ' + error);
			}
			});
		});
	</script>

	<!-- Isi Grafik Laba - Rugi -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script> -->
    <script>
		$(document).ready(function(){
			$.ajax({
			url: '<?php echo site_url('SuperUser/Home/labarugi') ?>',
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				var ctx = document.getElementById('labarugi').getContext('2d');
				var labarugi = new Chart(ctx, {
					type: 'bar',
					data: {
						// labels: ['KP', 'RSG', 'RST', 'RSP', 'RSMU', 'URJ'],
						datasets: [{
							label: 'Revenue',
							data: data.realisasi1,
							backgroundColor: 'rgba(0, 0, 128, 0.2)',
							borderColor: 'rgba(0, 0, 128, 1)',
							borderWidth: 2
						}, {
							label: 'Potensi',
							data: data.potensi1,
							backgroundColor: 'rgba(255, 99, 132, 0.5)',
							borderColor: 'rgba(255, 0, 0, 1)',
							borderWidth: 2
						}, {
							label: 'Target',
							data: data.target1,
							type: 'line',  // tipe dataset menjadi line
							fill: false,  // isi area di bawah garis target dinonaktifkan
							backgroundColor: 'rgba(50, 205, 50, 0.2)',
							borderColor: 'rgba(50, 205, 50, 1)',
							borderWidth: 3,
							tension: 0.4 // nilai kekencangan kurva pada titik data
						}]
					},
					options: {
						scales: {
							x: {
							grid: {
								display: false
							}
							},
							y: {
							grid: {
								display: false
							},
							ticks: {
								callback: function(value, index, values) {
								return 'Rp. ' + (value / 1000000).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0});
								}
							}
							}
						},
						plugins: {
							legend: {
							position: 'bottom'
							},
							tooltip: {
								callbacks: {
									label: function(context) {
										var label = context.dataset.label || '';
										if (label) {
										label += ': ';
										}
										label += 'Rp. ' + (context.parsed.y / 1000000).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0}) + ' ( jt )';
										return label;
									}
								}
							}
						},
						responsive: true
					}
				});
			},
			error: function(xhr, status, error) {
				// Tangani kesalahan jika terjadi
				console.log('Error: ' + error);
			}
			});
		});
	</script>

	<!-- Isi Grafik Biaya -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script> -->
    <script>
		$(document).ready(function(){
			$.ajax({
			url: '<?php echo site_url('SuperUser/Home/beban') ?>',
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				var ctx = document.getElementById('beban').getContext('2d');
				var beban = new Chart(ctx, {
					type: 'bar',
					data: {
						// labels: ['KP', 'RSG', 'RST', 'RSP', 'RSMU', 'URJ'],
						datasets: [{
							label: 'Revenue',
							data: data.realisasi2,
							backgroundColor: 'rgba(0, 0, 128, 0.2)',
							borderColor: 'rgba(0, 0, 128, 1)',
							borderWidth: 2
						}, {
							label: 'Potensi',
							data: data.potensi2,
							backgroundColor: 'rgba(255, 99, 132, 0.5)',
							borderColor: 'rgba(255, 0, 0, 1)',
							borderWidth: 2
						}, {
							label: 'Target',
							data: data.target2,
							type: 'line',  // tipe dataset menjadi line
							fill: false,  // isi area di bawah garis target dinonaktifkan
							backgroundColor: 'rgba(50, 205, 50, 0.2)',
							borderColor: 'rgba(50, 205, 50, 1)',
							borderWidth: 3,
							tension: 0.4 // nilai kekencangan kurva pada titik data
						}]
					},
					options: {
						scales: {
							x: {
							grid: {
								display: false
							}
							},
							y: {
							grid: {
								display: false
							},
							ticks: {
								callback: function(value, index, values) {
								return 'Rp. ' + (value / 1000000).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0});
								}
							}
							}
						},
						plugins: {
							legend: {
							position: 'bottom'
							},
							tooltip: {
								callbacks: {
									label: function(context) {
										var label = context.dataset.label || '';
										if (label) {
										label += ': ';
										}
										label += 'Rp. ' + (context.parsed.y / 1000000).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0}) + ' ( jt )';
										return label;
									}
								}
							}
						},
						responsive: true
					}
				});
			},
			error: function(xhr, status, error) {
				// Tangani kesalahan jika terjadi
				console.log('Error: ' + error);
			}
			});
		});
	</script>

	<!-- Isi Grafik Kunjungan -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script> -->
    <script>
		$(document).ready(function(){
			$.ajax({
			url: '<?php echo site_url('SuperUser/Home/kunjungan') ?>',
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				var ctx = document.getElementById('kunjungan').getContext('2d');
				var kunjungan = new Chart(ctx, {
					type: 'bar',
					data: {
						// labels: ['RSG', 'RSMU', 'RSP', 'RST'],
						datasets: [{
							label: 'Realisasi',
							data: data.realisasi3,
							backgroundColor: 'rgba(0, 0, 128, 0.2)',
							borderColor: 'rgba(0, 0, 128, 1)',
							borderWidth: 2
						}, {
							label: 'Potensi',
							data: data.potensi3,
							backgroundColor: 'rgba(255, 99, 132, 0.5)',
							borderColor: 'rgba(255, 0, 0, 1)',
							borderWidth: 2
						}, {
							label: 'Target',
							data: data.target3,
							type: 'line',  // tipe dataset menjadi line
							fill: false,  // isi area di bawah garis target dinonaktifkan
							backgroundColor: 'rgba(50, 205, 50, 0.2)',
							borderColor: 'rgba(50, 205, 50, 1)',
							borderWidth: 3,
							tension: 0.4 // nilai kekencangan kurva pada titik data
						}]
					},
					options: {
						scales: {
							x: {
							grid: {
								display: false
							}
							},
							y: {
							grid: {
								display: false
							},
							ticks: {
								callback: function(value, index, values) {
									return (value).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0});
								}
							}
							}
						},
						plugins: {
							legend: {
							position: 'bottom'
							},
							tooltip: {
								callbacks: {
									label: function(context) {
										var label = context.dataset.label || '';
										if (label) {
										label += ': ';
										}
										label += (context.parsed.y).toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0});
										return label;
									}
								}
							}
						},
						responsive: true
					}
				});
			},
			error: function(xhr, status, error) {
				// Tangani kesalahan jika terjadi
				console.log('Error: ' + error);
			}
			});
		});
    </script>

</body>
<!--end::Body-->

</html>